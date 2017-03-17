<?php
namespace Atemschutz\CoreBundle\Controller;

use Atemschutz\CoreBundle\Security\Roles;

use Atemschutz\CoreBundle\Entity\User;
use Atemschutz\CoreBundle\Form\Type\UserType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Benjamin Ihrig
 */
class UserController extends Controller {

	/**
	 * @Route("/", name="user_index")
	 */
	public function indexAction() {
		$users = $this->getDoctrine()
			->getRepository('AtemschutzCoreBundle:User')
			->findAll();

		return $this->render(
				'AtemschutzCoreBundle:User:index.html.twig',
				array('users' => $users)
		);
	}

	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/newAtsgt/{id}", name="user_new_atsgt")
	 */
	public function newFromAtemschutzgeraetetraeger($id) {
		$atemschutzgeraetetraeger = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
			->find($id);

		if (!$atemschutzgeraetetraeger) {
			throw $this->createNotFoundException('Atemschutzgeräteträger wurde nicht gefunden.');
		}

		$user = new User();
		$user->setRoles(array(Roles::$USER));
		$user->setFirstname($atemschutzgeraetetraeger->getFirstname());
		$user->setLastname($atemschutzgeraetetraeger->getLastname());
		$user->setOrganisation($atemschutzgeraetetraeger->getOrganisation());

		$form = $this->createForm(new UserType(), $user, array('fromAtsgt' => true, 'edit' => false));

		if ($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());

			if ($form->isValid()) {
				$roles = $user->getRoles();
				if(!in_array(Roles::$USER, $roles)) {
					array_push($roles, Roles::$USER);
				}
				$user->setRoles($roles);
				
				//GENERTE PASSWORD
				$factory = $this->get('security.encoder_factory');
				
				$encoder = $factory->getEncoder($user);
				$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
				$user->setPassword($password);
				
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();

				$atemschutzgeraetetraeger->setUser($user);

				$em->persist($atemschutzgeraetetraeger);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Der Benutzer wurde erstellt.');

				return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_show', array('id' => $atemschutzgeraetetraeger->getId(), '_format' => 'html')));
			}
		}

		return $this->render(
				'AtemschutzCoreBundle:User:fromAtsgt.html.twig',
				array(
						'form' => $form->createView(),
						'atemschutzgeraetetraeger' => $atemschutzgeraetetraeger
				)
		);
	}

	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/new", name="user_new")
	 */
	public function newAction() {
		$user = new User();
		$user->setRoles(array(Roles::$USER));

		$form = $this->createForm(
			new UserType(),
			$user,
			array(
				'role_choices' => $this
					->get('security.context')
					->getToken()->getUser()->getAllocatableRoles(),
				'edit' => false
			)
		);

		if ($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());

			if ($form->isValid()) {
				$roles = $user->getRoles();
				if(!in_array(Roles::$USER, $roles)) {
					array_push($roles, Roles::$USER);
				}
				$user->setRoles($roles);

				//GENERTE PASSWORD
				$factory = $this->get('security.encoder_factory');

				$encoder = $factory->getEncoder($user);
				$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
				$user->setPassword($password);

				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Der Benutzer wurde erstellt.');

				return $this->redirect($this->generateUrl('user_index'));
			}
		}

		return $this->render(
				'AtemschutzCoreBundle:User:new.html.twig',
				array('form' => $form->createView())
		);
	}

	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/status/{id}", name="user_status")
	 */
	public function statusAction($id) {
		$user = $this->getDoctrine()
			->getRepository('AtemschutzCoreBundle:User')
			->find($id);

		if (!$user) {
			throw $this->createNotFoundException('Benutzer wurde nicht gefunden.');
		}

		$user->setIsActive($user->getIsActive() == false);

		$em = $this->getDoctrine()->getManager();
		$em->persist($user);
		$em->flush();
				
		$this->get('session')->getFlashBag()->add('notice', 'Der Benutzer wurde '.($user->getIsActive() ? 'aktiviert' : 'deaktiviert').'.');

		return $this->redirect($this->generateUrl('user_index'));
	}

	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/edit/{id}", name="user_edit")
	 */
	public function editAction($id) {
		$user = $this->getDoctrine()
			->getRepository('AtemschutzCoreBundle:User')->find($id);

		if (!$user) {
			throw $this->createNotFoundException('Benutzer wurde nicht gefunden.');
		}
		
		if ($this->get('security.context')
				->getToken()
				->getUser()
				->isAllowedToEdit($user)) {

			$oldPassword = $user->getPassword();
			$form = $this->createForm(
				new UserType(),
				$user,
				array(
					'role_choices' => $this
						->get('security.context')
						->getToken()->getUser()->getAllocatableRoles(),
					'edit' => true
				)
			);
			
			$oldRoles = $user->getRoles();
	
			if ($this->getRequest()->isMethod("POST")) {
				$form->bind($this->getRequest());
	
				if ($form->isValid()) {
	
					if ($user->getPassword() != '') {
						$factory = $this->get('security.encoder_factory');
						$encoder = $factory->getEncoder($user);
						$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
						$user->setPassword($password);
					} else {
						$user->setPassword($oldPassword);
					}
					
					$refactoredRoles = $this->get('role_manager')->refactorRoles($oldRoles, $user->getRoles(), $this
						->get('security.context')
						->getToken()->getUser());
					
					$user->setRoles($refactoredRoles);
	
					$em = $this->getDoctrine()->getManager();
					$em->persist($user);
					$em->flush();
					
					$this->get('session')->getFlashBag()->add('notice', 'Die Daten des Benutzers wurden geändert.');
	
					return $this->redirect($this->generateUrl('user_index'));
				}
			}
	
			return $this->render(
					'AtemschutzCoreBundle:User:edit.html.twig',
					array(
							'form' => $form->createView(),
							'user' => $user
					)
			);
		
		} else {
					$this->get('session')->getFlashBag()->add('error', 'Sie haben nicht die Rechte diesen Benutzer zu ändern.');
			return $this->redirect($this->generateUrl('user_index'));
		}
	}

	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/delete/{id}", name="user_delete")
	 */
	public function deleteAction($id) {

		if ($this->getRequest()->isMethod("POST")) {
			$user = $this->getDoctrine()
				->getRepository('AtemschutzCoreBundle:User')
				->find($id);

			if (!$user) {
				throw $this->createNotFoundException('Benutzer wurde nicht gefunden.');
			}
		
			if ($this->get('security.context')
					->getToken()
					->getUser()
					->isAllowedToEdit($user)) {
	
				$em = $this->getDoctrine()->getManager();
				$em->remove($user);
				$em->flush();
					
				$this->get('session')->getFlashBag()->add('notice', 'Der Benutzer wurde gelöscht.');
			} else {
				$this->get('session')->getFlashBag()->add('error', 'Sie haben nicht die Rechte den Benutzer zu löschen.');
				return $this->redirect($this->generateUrl('user_index'));
			}
		}

		return $this->redirect($this->generateUrl('user_index'));
	}
}
