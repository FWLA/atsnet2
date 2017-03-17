<?php
namespace Atemschutz\CoreBundle\Controller;

use Atemschutz\CoreBundle\Form\Type\MyAccountType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Benjamin Ihrig
 */
class MyAccountController extends Controller {
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/edit", name="myaccount_edit")
	 */
	public function editAction() {
		$user = $this->get('security.context')
			->getToken()->getUser();
		
		$oldPassword = $user->getPassword();
		$form = $this->createForm(new MyAccountType(), $user);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			if($form->isValid()) {
				if ($user->getPassword() != '') {
					$factory = $this->get('security.encoder_factory');
					$encoder = $factory->getEncoder($user);
					$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
					$user->setPassword($password);
				} else {
					$user->setPassword($oldPassword);
				}

				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Daten wurden geändert.');

				return $this->redirect($this->generateUrl('default_home'));
			}
		}
		
		return $this->render(
				'AtemschutzCoreBundle:MyAccount:edit.html.twig',
				array(
						'form' => $form->createView()
				)
		);
	}
}