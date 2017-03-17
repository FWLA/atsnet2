<?php
namespace Atemschutz\NachweisBundle\Controller;

use Atemschutz\NachweisBundle\Form\Type\SearchNachweisType;
use Atemschutz\NachweisBundle\Form\Type\SelectAtemschutzgeraetetraegerType;
use Atemschutz\NachweisBundle\Form\Type\SelectYearType;
use Atemschutz\NachweisBundle\Statistik\Jahresstatistik;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Benjamin Ihrig
 */
class ReportController extends Controller {
	
	/**
	 * @Route("/selectYear", name="report_select_year")
	 */
	public function selectYearAction() {

		// calculate available years from nachweis and g26
		$availableNachweisYears = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweis')
			->findAvailableYears();
		
		$availableG26Years = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:G26')
			->findAvailableYears();
		
		$years = array();
		foreach ($availableNachweisYears as $year) {
			$years[$year] = $year;
		}
		foreach ($availableG26Years as $year) {
			if (!in_array($year, $years)) {
				$years[$year] = $year;
			}
		}
		
		// asort low to high
		//asort($years);
		// arsort high to low
		arsort($years);
		
		$form = $this->createForm(new SelectYearType(), null, array('years' => $years));
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
				
			if($form->isValid()) {
				$year = $form->get('years')->getData();
				
				return $this->redirect($this->generateUrl('report_year', array('year' => $year, '_format' => 'html')));
			}
		}
		
		return $this->render(
			'AtemschutzNachweisBundle:Report:select.year.html.twig',
			array('form' => $form->createView())
		);
	}
	
	/**
	 * @Route("/year/{year}.{_format}", requirements={"_format" = "html|pdf"}, name="report_year")
	 */
	public function yearAction($year, $_format) {
				
		$jahresstatistik = $this->get('statistik')->getJahresstatistik($year);
		
		if ($_format === 'pdf') {
			$this->get('year.pdf')->create($jahresstatistik);
		}
		
		return $this->render(
			'AtemschutzNachweisBundle:Report:year.html.twig',
			array(
				'jahresstatistik' => $jahresstatistik
			)
		);
	}
	
	/**
	 * @Route("/searchNachweis", name="report_search_nachweis")
	 */
	public function searchNachweisAction() {
	// calculate available years from nachweis and g26
		$availableNachweisYears = $this->getDoctrine()
			->getRepository('AtemschutzNachweisBundle:Nachweis')
			->findAvailableYears();
		
		$years = array();
		foreach ($availableNachweisYears as $year) {
			$years[$year] = $year;
		}
		
		$form = $this->createForm(new SearchNachweisType(), null, array('years' => $years));
		
		if($this->getRequest()->isMethod("POST")) {
			$form->bind($this->getRequest());
			
			if($form->isValid()) {
				$year = $form->get('year')->getData();
				$einsatzNummer = $form->get('einsatzNummer')->getData();
				
				$nachweise = $this->getDoctrine()
					->getRepository('AtemschutzNachweisBundle:Nachweis')
					->findNachweisByEinsatz($year, $einsatzNummer);
				
				if($nachweise) {
					return $this->redirect($this->generateUrl('nachweis_show', array('id' => $nachweise[0]->getId(), '_format' => 'html')));
				} else {
					$this->get('session')->getFlashBag()->add('notice', 'Es wurden keine Einträge gefunden.');
					return $this->redirect($this->generateUrl('default_home'));
				}
			}
		}
		
		return $this->render(
				'AtemschutzNachweisBundle:Report:search.nachweis.html.twig',
				array('form' => $form->createView())
		);
	}
}