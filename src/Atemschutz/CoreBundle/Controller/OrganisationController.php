<?php
namespace Atemschutz\CoreBundle\Controller;

use Atemschutz\CoreBundle\Form\Type\OrganisationType;
use Atemschutz\CoreBundle\Entity\Organisation;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Benjamin Ihrig
 */
class OrganisationController extends Controller {
	
	/**
	 * @Route("/", name="organisation_index")
	 */
	public function indexAction() {
		$organisations = $this->getDoctrine()
			->getRepository('AtemschutzCoreBundle:Organisation')
			->findAll();
		
		return $this->render(
				'AtemschutzCoreBundle:Organisation:index.html.twig',
				array('organisations' => $organisations)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/new", name="organisation_new")
	 */
	public function newAction() {
		$organisation = new Organisation();
		
		$form = $this->createForm(new OrganisationType(), $organisation);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($organisation);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Organisation wurde erstellt.');
				
				return $this->redirect($this->generateUrl('organisation_index'));
			}
		}
		
		return $this->render(
				'AtemschutzCoreBundle:Organisation:new.html.twig',
				array('form' => $form->createView())
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/edit/{id}", name="organisation_edit")
	 */
	public function editAction($id) {
		$organisation = $this->getDoctrine()
			->getRepository('AtemschutzCoreBundle:Organisation')
			->find($id);
		
		if(!$organisation) {
			throw $this->createNotFoundException('Organisation wurde nicht gefunden.');
		}
		
		$form = $this->createForm(new OrganisationType(), $organisation);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($organisation);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Organisation wurde geändert.');
				
				return $this->redirect($this->generateUrl('organisation_index'));
			}
		}
		
		return $this->render(
				'AtemschutzCoreBundle:Organisation:edit.html.twig',
				array(
					'form' => $form->createView(),
					'organisation' => $organisation
				)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/delete/{id}", name="organisation_delete")
	 */
	public function deleteAction($id) {
		
		if($this->getRequest()->isMethod("POST")) {
			$organisation = $this->getDoctrine()
				->getRepository('AtemschutzCoreBundle:Organisation')
				->find($id);
			
			if(!$organisation) {
				throw $this->createNotFoundException('Organisation wurde nicht gefunden.');
			}
			
			if(!$organisation->getUsers()->isEmpty()) {
				$this->get('session')->getFlashBag()->add('error', 'Die Organisation kann nicht gelöscht werden, da ihm noch Benutzer zugewiesen sind.');
			} else {
				$em = $this->getDoctrine()->getManager();
				$em->remove($organisation);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Organisation wurde gelöscht.');
			}
		}
		
		return $this->redirect($this->generateUrl('organisation_index'));
	}
}