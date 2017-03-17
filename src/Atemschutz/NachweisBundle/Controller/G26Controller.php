<?php
namespace Atemschutz\NachweisBundle\Controller;

use Atemschutz\NachweisBundle\Entity\G26;
use Atemschutz\NachweisBundle\Form\Type\G26Type;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Benjamin Ihrig
 */
class G26Controller extends Controller {
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/void/{id}", name="g26_void")
	 */
	public function voidAction($id) {
		$g26 = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:G26')
			->find($id);
		
		if(!$g26) {
			throw $this->createNotFoundException('G26 wurde nicht gefunden.');
		}
		
		if($this->getRequest()->isMethod("POST")) {
			$g26->setValid(false);
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($g26);
			$em->flush();
					
			$this->get('session')->getFlashBag()->add('notice', 'Die G26 wurde ungültig gemacht.');
		}
		return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_show', array('id' => $g26->getAtemschutzgeraetetraeger()->getId(), '_format' => 'html')));
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/new/{atemschutzgeraetetraegerId}", name="g26_new")
	 */
	public function newAction($atemschutzgeraetetraegerId) {
		$atemschutzgeraetetraeger = $this->getDoctrine()
		->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
		->find($atemschutzgeraetetraegerId);
		
		if(!$atemschutzgeraetetraeger) {
			throw $this->createNotFoundException('Atemschutzgeräteträger wurde nicht gefunden.');
		}
		
		$g26 = new G26();
		$g26->setAtemschutzgeraetetraeger($atemschutzgeraetetraeger);
		$g26->setAtemschutzgeraetewart(
				$this
				->get('security.context')
				->getToken()->getUser()
		);
		
		$form = $this->createForm(new G26Type(), $g26);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($g26);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die G26 wurde eingetragen.');
				
				return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_show', array('id' => $atemschutzgeraetetraegerId, '_format' => 'html')));
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:G26:new.html.twig',
				array(
						'form' => $form->createView(),
						'g26' => $g26
				)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/edit/{id}", name="g26_edit")
	 */
	public function editAction($id) {
		$g26 = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:G26')
			->find($id);
		
		if(!$g26) {
			throw $this->createNotFoundException('G26 wurde nicht gefunden.');
		}
		
		$form = $this->createForm(new G26Type(), $g26, array('edit' => true));
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($g26);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die G26 wurde geändert.');
				
				return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_show', array('id' => $g26->getAtemschutzgeraetetraeger()->getId(), '_format' => 'html')));
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:G26:edit.html.twig',
				array(
						'form' => $form->createView(),
						'g26' => $g26
				)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/delete/{id}", name="g26_delete")
	 */
	public function deleteAction($id) {
		
		$g26 = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:G26')
			->find($id);
		
		if(!$g26) {
			throw $this->createNotFoundException('G26 wurde nicht gefunden.');
		}

		if($this->getRequest()->isMethod("POST")) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($g26);
			$em->flush();
				
			$this->get('session')->getFlashBag()->add('notice', 'Die G26 wurde gelöscht.');
		}
		
		return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_show', array('id' => $g26->getAtemschutzgeraetetraeger()->getId())));
	}
}