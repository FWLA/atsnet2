<?php
namespace Atemschutz\NachweisBundle\Controller;

use Atemschutz\NachweisBundle\Entity\Nachweis;
use Atemschutz\NachweisBundle\Form\Type\BulkNachweisType;
use Atemschutz\NachweisBundle\Form\Type\NachweisType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Benjamin Ihrig
 */
class NachweisController extends Controller {
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/new/{atemschutzgeraetetraegerId}", name="nachweis_new")
	 */
	public function newAction($atemschutzgeraetetraegerId) {
		$atemschutzgeraetetraeger = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
			->find($atemschutzgeraetetraegerId);
		
		if(!$atemschutzgeraetetraeger) {
			throw $this->createNotFoundException('Atemschutzgeräteträger wurde nicht gefunden.');
		}
		
		$nachweis = new Nachweis();
		$nachweis->setAtemschutzgeraetetraeger($atemschutzgeraetetraeger);
		$nachweis->setAtemschutzgeraetewart(
				$this
				->get('security.context')
				->getToken()->getUser()
		);
		
		$form = $this->createForm(new NachweisType(), $nachweis);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($nachweis);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Der Nachweis wurde eingetragen.');
				
				return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_show', array('id' => $atemschutzgeraetetraegerId, '_format' => 'html')));
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:Nachweis:new.html.twig',
				array(
						'form' => $form->createView(),
						'atemschutzgeraetetraeger' => $atemschutzgeraetetraeger
				)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/bulk", name="nachweis_bulk")
	 */
	public function bulkAction() {
		$baseNachweis = new Nachweis();
		$baseNachweis->setAtemschutzgeraetewart(
				$this
				->get('security.context')
				->getToken()->getUser()
		);
		
		$form = $this->createForm(new BulkNachweisType(), $baseNachweis);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
				
			if($form->isValid()) {
				$atemschutzgeraetetraegers = $this->getRequest()->request->get('atemschutzgeraetetraegers');
				$times = $this->getRequest()->request->get('times');
				$works = $this->getRequest()->request->get('work');
				
				$count = 0;
				
				for ($i = 0; $i < count($times); $i++) {
					$nachweis = clone $baseNachweis;
					
					$atemschutzgeraetetraeger = $this->getDoctrine()
						->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
						->find($atemschutzgeraetetraegers[$i]);
					
					if ($atemschutzgeraetetraeger) {
						$nachweis->setAtemschutzgeraetetraeger($atemschutzgeraetetraeger);
						$nachweis->setTime($times[$i]);
						$nachweis->setWork($works[$i]);
						
						$em = $this->getDoctrine()->getManager();
						$em->persist($nachweis);
						$em->flush();
						$count++;
					}
				}
				
				$this->get('session')->getFlashBag()->add('notice', 'Es wurden '.$count.' Nachweise eingetragen.');
				
				return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_index'));
			}
		}
		
		$atemschutzgeraetetraegers = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
			->findAllActiveOrderedByName();
		
		return $this->render(
				'AtemschutzNachweisBundle:Nachweis:bulk.html.twig',
				array(
						'form' => $form->createView(),
						'atemschutzgeraetetraegers' => $atemschutzgeraetetraegers)
		);
	}
	
	/**
	 * @Route("/used/locations", name="nachweis_used_locations")
	 */
	public function usedLocationsAction() {
		$usedLocations = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweis')
			->findUsedLocationsGrouped();
		
		$locations = array();
		foreach ($usedLocations as $location) {
			$locations[] = $location["location"];
		}
		return new Response(json_encode($locations));
	}
	
	/**
	 * @Route("/used/work", name="nachweis_used_work")
	 */
	public function usedWorkAction() {
		$usedWork = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweis')
			->findUsedWorkGrouped();
		
		$work = array();
		foreach ($usedWork as $workEntry) {
			$work[] = $workEntry["work"];
		}
		return new Response(json_encode($work));
	}
	
	/**
	 * @Route("/show/{id}.{_format}", requirements={"_format" = "html|pdf"}, name="nachweis_show")
	 */
	public function showAction($id, $_format) {
		$nachweis = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweis')
			->find($id);
		
		if(!$nachweis) {
			throw $this->createNotFoundException("Der Nachweis wurde nicht gefunden.");
		}
		
		if($_format === 'pdf') {
			$this->get('nachweis.pdf')->create($nachweis);
		}
		
		$otherNachweise = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweis')
			->findNachweisEqualDateAndLocation($nachweis);
		
		return $this->render(
				'AtemschutzNachweisBundle:Nachweis:show.html.twig',
				array(
						'nachweis' => $nachweis,
						'otherNachweise' => $otherNachweise
				)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/edit/{id}", name="nachweis_edit")
	 */
	public function editAction($id) {
		$nachweis = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweis')
			->find($id);
		
		if(!$nachweis) {
			throw $this->createNotFoundException('Der Nachweis wurde nicht gefunden.');
		}
		
		$form = $this->createForm(new NachweisType(), $nachweis);
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($nachweis);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Der Nachweis wurde geändert.');
				
				return $this->redirect($this->generateUrl('nachweis_show', array('id' => $nachweis->getId(), '_format' => 'html')));
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:Nachweis:edit.html.twig',
				array(
						'form' => $form->createView(),
						'nachweis' => $nachweis
				)
		);
	}
	
	/**
	 * @Secure(roles="IS_AUTHENTICATED_FULLY")
	 * @Route("/delete/{id}", name="nachweis_delete")
	 */
	public function deleteAction($id) {
		
		$nachweis = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweis')
			->find($id);
		
		if(!$nachweis) {
			throw $this->createNotFoundException('Der Nachweis wurde nicht gefunden.');
		}

		if($this->getRequest()->isMethod("POST")) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($nachweis);
			$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Der Nachweis wurde gelöscht.');
		}
		
		return $this->redirect($this->generateUrl('atemschutzgeraetetraeger_show', array('id' => $nachweis->getAtemschutzgeraetetraeger()->getId(), '_format' => 'html')));
	}
}