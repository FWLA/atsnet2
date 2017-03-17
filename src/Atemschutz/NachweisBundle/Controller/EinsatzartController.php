<?php
namespace Atemschutz\NachweisBundle\Controller;

use Atemschutz\NachweisBundle\Entity\Einsatzart;
use Atemschutz\NachweisBundle\Form\Type\EinsatzartType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Benjamin Ihrig
 */
class EinsatzartController extends Controller {
	
	/**
	 * @Route("/", name="einsatzart_index")
	 */
	public function indexAction() {
		$einsatzarts = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Einsatzart')
			->findAll();
		
		return $this->render(
				'AtemschutzNachweisBundle:Einsatzart:index.html.twig',
				array('einsatzarts' => $einsatzarts)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/new", name="einsatzart_new")
	 */
	public function newAction() {
		$einsatzart = new Einsatzart();
		
		$form = $this->createForm(new EinsatzartType(), $einsatzart);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($einsatzart);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Einsatzart wurde erstellt.');
				
				return $this->redirect($this->generateUrl('einsatzart_index'));
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:Einsatzart:new.html.twig',
				array('form' => $form->createView())
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/edit/{id}", name="einsatzart_edit")
	 */
	public function editAction($id) {
		$einsatzart = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Einsatzart')
			->find($id);
		
		if(!$einsatzart) {
			throw $this->createNotFoundException("Einsatzart wurde nicht gefunden.");
		}
		
		$form = $this->createForm(new EinsatzartType(), $einsatzart);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($einsatzart);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Einsatzart wurde geändert.');
				
				return $this->redirect($this->generateUrl('einsatzart_index'));
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:Einsatzart:edit.html.twig',
				array(
						'form' => $form->createView(),
						'einsatzart' => $einsatzart
				)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/delete/{id}", name="einsatzart_delete")
	 */
	public function deleteAction($id) {
		
		if($this->getRequest()->isMethod("POST")) {
			$einsatzart = $this->getDoctrine()
				->getRepository('AtemschutzNachweisBundle:Einsatzart')
				->find($id);
			
			if(!$einsatzart) {
				throw $this->createNotFoundException("Einsatzart wurde nicht gefunden.");
			}
			
			$nachweises = $this->getDoctrine()
				->getRepository('AtemschutzNachweisBundle:Nachweis')
				->findByEinsatzart($einsatzart);
			
			if($nachweises) {
				$this->get('session')->getFlashBag()->add('error', 'Die Einsatzart kann nicht gelöscht werden, da sie noch mit einem oder mehreren Nachweisen verknüpft ist.');
			} else {
				$em = $this->getDoctrine()->getManager();
				$em->remove($einsatzart);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Einsatzart wurde gelöscht.');
			}
		}
		
		return $this->redirect($this->generateUrl('einsatzart_index'));
	}
}