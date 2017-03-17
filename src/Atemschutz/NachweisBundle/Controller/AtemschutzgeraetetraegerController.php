<?php
namespace Atemschutz\NachweisBundle\Controller;

use Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger;
use Atemschutz\NachweisBundle\Form\Type\AtemschutzgeraetetraegerType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Benjamin Ihrig
 */
class AtemschutzgeraetetraegerController extends Controller {
	
	/**
	 * @Route("/index.html", name="atemschutzgeraetetraeger_index")
	 */
	public function indexAction() {
		$atemschutzgeraetetraegers = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
			->findAll();
		
		return $this->render(
				'AtemschutzNachweisBundle:Atemschutzgeraetetraeger:index.html.twig',
				array('atemschutzgeraetetraegers' => $atemschutzgeraetetraegers)
		);
	}
	
	/**
	 * @Route("/report.{_format}", requirements={"_format" = "html|pdf"}, name="atemschutzgeraetetraeger_report")
	 */
	public function reportAction($_format) {
		$table = $this->get('tauglichkeit')
			->getTauglichkeitReport();
		
		if($_format === 'pdf') {
			$this->get('report.pdf')->create();
		}
		
		return $this->render(
			'AtemschutzNachweisBundle:Atemschutzgeraetetraeger:report.html.twig',
			array(
					'tauglich0' => $table[0],
					'tauglich1' => $table[1],
					'tauglich2' => $table[2]
			)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/show/{id}.{_format}", requirements={"_format" = "html|pdf"}, name="atemschutzgeraetetraeger_show")
	 */
	public function showAction($id, $_format) {
		$atemschutzgeraetetraeger = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
			->find($id);
		
		if(!$atemschutzgeraetetraeger) {
			throw $this->createNotFoundException('Atemschutzgeräteträger wurde nicht gefunden.');
		}
		
		if($_format === 'pdf') {
			$this->get('atemschutzgeraetetraeger.pdf')->create($atemschutzgeraetetraeger);
		}
		
		$info = $this->get('tauglichkeit')
			->getTauglichkeitInfoFactory()
			->getTauglichkeitInfo($atemschutzgeraetetraeger);
		
		return $this->render(
			'AtemschutzNachweisBundle:Atemschutzgeraetetraeger:show.html.twig',
			array(
				'atemschutzgeraetetraeger' => $atemschutzgeraetetraeger,
				'info' => $info,
			)
		);
	}
	
	/**
	 * @Route("/showMy.html", name="atemschutzgeraetetraeger_showMy")
	 */
	public function showMyAction() {
		$atemschutzgeraetetraeger = $this
			->get('security.context')
			->getToken()
			->getUser()
			->getAtemschutzgeraetetraeger();
		return $this->showAction($atemschutzgeraetetraeger->getId(), 'html');
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/new.html", name="atemschutzgeraetetraeger_new")
	 */
	public function newAction() {
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		
		$form = $this->createForm(new AtemschutzgeraetetraegerType(), $atemschutzgeraetetraeger);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($atemschutzgeraetetraeger);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Der Atemschutzgeräteträger wurde erstellt.');
				
				if($form->get('createUser')->getData()) {
					return $this->redirect($this->generateUrl('user_new_atsgt', array('id' => $atemschutzgeraetetraeger->getId())));
				} else {
					return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_index'));
				}
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:Atemschutzgeraetetraeger:new.html.twig',
				array('form' => $form->createView())
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/status/{id}", name="atemschutzgeraetetraeger_status")
	 */
	public function statusAction($id) {
		$atemschutzgeraetetraeger = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
			->find($id);
		
		if(!$atemschutzgeraetetraeger) {
			throw $this->createNotFoundException('Atemschutzgeräteträger wurde nicht gefunden.');
		}
		
		if($this->getRequest()->isMethod("POST")) {
			$atemschutzgeraetetraeger->setIsActive($atemschutzgeraetetraeger->getIsActive() == false);
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($atemschutzgeraetetraeger);
			$em->flush();
			
			$this->get('session')->getFlashBag()->add('notice', 'Der Atemschutzgeräteträger wurde '.($atemschutzgeraetetraeger->getIsActive() ? 'aktiviert' : 'deaktiviert').'.');
		}
		
		return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_index'));
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/edit/{id}.html", name="atemschutzgeraetetraeger_edit")
	 */
	public function editAction($id) {
		$atemschutzgeraetetraeger = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
			->find($id);
		
		if(!$atemschutzgeraetetraeger) {
			throw $this->createNotFoundException('Atemschutzgeräteträger wurde nicht gefunden.');
		}
		
		$form = $this->createForm(new AtemschutzgeraetetraegerType(), $atemschutzgeraetetraeger, array('edit' => true));
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($atemschutzgeraetetraeger);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Die Daten des Atemschutzgeräteträgers wurden geändert.');
				
				return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_show', array('id' => $id, '_format' => 'html')));
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:Atemschutzgeraetetraeger:edit.html.twig',
				array(
						'form' => $form->createView(),
						'atemschutzgeraetetraeger' => $atemschutzgeraetetraeger
				)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/delete/{id}.html", name="atemschutzgeraetetraeger_delete")
	 */
	public function deleteAction($id) {
		
		if($this->getRequest()->isMethod("POST")) {
			$atemschutzgeraetetraeger = $this->getDoctrine()
				->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
				->find($id);
			
			if(!$atemschutzgeraetetraeger) {
				throw $this->createNotFoundException('Atemschutzgeräteträger wurde nicht gefunden.');
			}
			
			$em = $this->getDoctrine()->getManager();
			$em->remove($atemschutzgeraetetraeger);
			$em->flush();
				
			$this->get('session')->getFlashBag()->add('notice', 'Der Atemschutzgeräteträger wurde gelöscht.');
		}
		
		return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_index'));
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/tauglichkeit/report/{_format}", requirements={"_format" = "html|pdf"} , name="atemschutzgeraetetraeger_tauglichkeit_report")
	 */
	public function atemschutzgeraetetraegerTauglichkeitReportAction($_format) {
		$atemschutzgeraetetraegers = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
			->findAllActiveOrderedByName();
		
		$requiredAts1 = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweisart')
			->getNachweisartsForAts1();
		
		$requiredAts2 = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweisart')
			->getNachweisartsForAts2();
		
		return $this->render(
				sprintf('AtemschutzNachweisBundle:Atemschutzgeraetetraeger:tauglichkeit.report.%s.twig', $_format),
				array(
						'atemschutzgeraetetraegers' => $atemschutzgeraetetraegers,
						'requiredAts1' => $requiredAts1,
						'requiredAts2' => $requiredAts2
				)
		);
	}
}