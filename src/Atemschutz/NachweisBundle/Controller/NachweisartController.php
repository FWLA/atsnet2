<?php
namespace Atemschutz\NachweisBundle\Controller;

use Atemschutz\NachweisBundle\Entity\Nachweisart;
use Atemschutz\NachweisBundle\Form\Type\NachweisartType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Benjamin Ihrig
 */
class NachweisartController extends Controller {
	
	/**
	 * @Route("/", name="nachweisart_index")
	 */
	public function indexAction() {
		$nachweisarts = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweisart')
			->findAll();
		
		return $this->render(
				'AtemschutzNachweisBundle:Nachweisart:index.html.twig',
				array('nachweisarts' => $nachweisarts)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/new", name="nachweisart_new")
	 */
	public function newAction() {
		$nachweisart = new Nachweisart();
		
		$form = $this->createForm(new NachweisartType(), $nachweisart);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($nachweisart);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Nachweisart wurde erstellt.');
				
				return $this->redirect($this->generateUrl('nachweisart_index'));
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:Nachweisart:new.html.twig',
				array('form' => $form->createView())
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/edit/{id}", name="nachweisart_edit")
	 */
	public function editAction($id) {
		$nachweisart = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweisart')
			->find($id);
		
		if(!$nachweisart) {
			throw $this->createNotFoundException('Nachweisart wurde nicht gefunden.');
		}
		
		$form = $this->createForm(new NachweisartType(), $nachweisart);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($nachweisart);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Nachweisart wurde geändert.');
				
				return $this->redirect($this->generateUrl('nachweisart_index'));
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:Nachweisart:edit.html.twig',
				array(
						'form' => $form->createView(),
						'nachweisart' => $nachweisart
				)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/delete/{id}", name="nachweisart_delete")
	 */
	public function deleteAction($id) {
		
		if($this->getRequest()->isMethod("POST")) {
			$nachweisart = $this->getDoctrine()
				->getRepository('AtemschutzNachweisBundle:Nachweisart')
				->find($id);
			
			if(!$nachweisart) {
				throw $this->createNotFoundException('Nachweisart wurde nicht gefunden.');
			}
			
			$nachweises = $this->getDoctrine()
				->getRepository('AtemschutzNachweisBundle:Nachweis')
				->findByNachweisart($nachweisart);
			
			if($nachweises) {
				$this->get('session')->getFlashBag()->add('error', 'Nachweisart kann nicht gelöscht werden, da von dieser Nachweisart bereits Einträge vorhanden sind.');
			} else {
				$em = $this->getDoctrine()->getManager();
				$em->remove($nachweisart);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Nachweisart wurde gelöscht.');
			}
		}
		
		return $this->redirect($this->generateUrl('nachweisart_index'));
	}
}