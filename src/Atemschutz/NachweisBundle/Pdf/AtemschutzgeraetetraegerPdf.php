<?php
namespace Atemschutz\NachweisBundle\Pdf;

use Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger;
use Atemschutz\CoreBundle\Entity\User;
use Atemschutz\NachweisBundle\Tauglichkeit\Tauglichkeit;
use Symfony\Component\Security\Core\SecurityContext;
use WhiteOctober\TCPDFBundle\Controller\TCPDFController;

class AtemschutzgeraetetraegerPdf extends \TCPDF {
	
	/**
	 * @var Tauglichkeit
	 */
	private $tauglichkeit;
	
	/**
	 * @var User
	 */
	private $user;
	
	public function __construct(Tauglichkeit $tauglichkeit, SecurityContext $securityContext) {
		parent::__construct();
		$this->tauglichkeit = $tauglichkeit;
		$this->user = $securityContext->getToken()->getUser();
		$this->SetTopMargin(35);
	}
	
	/**
	 * 
	 */
	public function Header() {
		$this->Image('../src/Atemschutz/CoreBundle/Resources/public/images/logo.png', 140, 10, 100, 0);
		$this->SetY(10);
		$this->SetFont('helvetica', 'U', 16);
		$this->Cell(0, 10, 'Atemschutznachweis');
	}

	/**
	 * 
	 */
	public function Footer() {
		$this->SetY(-15);
		$this->SetFont('helvetica', '', 8);
		$date = new \DateTime();
		$this->Cell(20, 10, $date->format('d.m.Y'), 0, false, 'L', 0, '', 0, false, 'T', 'M');
		$this->Cell(150, 10, 'Bearbeiter: '.$this->user->__toString(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Cell(15, 10, 'Seite '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
	}
	
	public function create(Atemschutzgeraetetraeger $atemschutzgeraetetraeger) {
		$this->SetCreator($this->user->__toString());
		$this->SetAuthor('ATS.net 2');
		$this->SetTitle('Atemschutzgeräteträger');
		$this->SetSubject('Bericht Atemschutzgeräteträger \''.$atemschutzgeraetetraeger.'\'');
		
		$this->addGenericInformation($atemschutzgeraetetraeger);
		
		$this->addCurrentRecords($atemschutzgeraetetraeger);
		
		$this->AddPage();
		
		$this->addG26s($atemschutzgeraetetraeger);
		
		$this->addRecord($atemschutzgeraetetraeger);
		
		$this->Output('test.pdf', 'I');
	}
	
	private function addGenericInformation(Atemschutzgeraetetraeger $atemschutzgeraetetraeger)
	{
		$this->AddPage();
		
		/*
		 * begin Allgemeine infos
		*/
		$this->SetFont('helvetica', 'B', 12);
		$this->SetY(25);
		$this->Cell(0, 10, 'Allgemein', 0, 1);
		$this->Ln(5);
		
		$this->SetFont('helvetica', '', 11);
		// name
		$this->Cell(40, 10, 'Name:');
		$this->Cell(40, 10, $atemschutzgeraetetraeger->__toString(), 0, 1);
		// geburtsdatum
		$this->Cell(40, 10, 'Geburtsdatum:');
		$this->Cell(40, 10, $atemschutzgeraetetraeger->getBirthdateFormatted(), 0, 1);
		// organisation
		$this->Cell(40, 10, 'Organisation:');
		$this->Cell(40, 10, $atemschutzgeraetetraeger->getOrganisation(), 0, 1);
		// lehrgänge
		$this->Cell(40, 10, 'Lehrgänge:');
		if($atemschutzgeraetetraeger->getAts1() != null) {
			$this->Cell(40, 10, 'Atemschutz 1: '.$atemschutzgeraetetraeger->getAts1Formatted(), 0, 1);
		} else {
			$this->Cell(40, 10, 'Atemschutz 1: Nicht vorhanden', 0, 1);
		}
		$this->Cell(40, 10);
		if($atemschutzgeraetetraeger->getAts2() != null) {
			$this->Cell(40, 10, 'Atemschutz 2: '.$atemschutzgeraetetraeger->getAts2Formatted(), 0, 1);
		} else {
			$this->Cell(40, 10, 'Atemschutz 2: Nicht vorhanden', 0, 1);
		}
		/*
		 * ende allgemeine infos
		*/
	}
	
	private function addCurrentRecords(Atemschutzgeraetetraeger $atemschutzgeraetetraeger)
	{
		/*
		 * begin aktueller nachweis
		 */
		$this->SetFont('helvetica', 'B', 12);
		$this->Ln(5);
		$this->Cell(0, 10, 'Aktueller Nachweis', 0, 1);
		$this->Ln(5);
		
		$this->SetFont('helvetica', '', 11);
		
		// g26
		$this->Cell(40, 10, 'G26.3');
		if($atemschutzgeraetetraeger->getLatestValidG26() == null) {
			$this->Cell(40, 10, 'Keine gültige G26.3.', 0, 1);
		} else {
			$this->Cell(40, 10, $atemschutzgeraetetraeger->getLatestValidG26()->getDateFormatted().' gültig bis '.$atemschutzgeraetetraeger->getLatestValidG26()->getDueDateFormatted(), 0, 1);
		}
		
		// nachweise ats1
		if($atemschutzgeraetetraeger->getAts1() != null) {
			$this->Ln(5);
			$tauglichkeitInfo = $this->tauglichkeit->getTauglichkeitInfoFactory()
				->getTauglichkeitInfo($atemschutzgeraetetraeger);
			
			foreach ($tauglichkeitInfo->getRequiredsForAts1() as $nachweisartNachweisPair) {
				$this->Cell(40, 10, $nachweisartNachweisPair->getNachweisart()->__toString());
				if($nachweisartNachweisPair->getNachweis() == null) {
					$this->Cell(40, 10, 'Nicht vorhanden', 0, 1);
				} else {
					$this->Cell(40, 10, $nachweisartNachweisPair->getNachweis()->getDateFormatted().' gültig bis '.$nachweisartNachweisPair->getNachweis()->getExpiringDateFormatted(), 0, 1);
				}
			}
		}
		
		// nachweise ats2
		if($atemschutzgeraetetraeger->getAts2() != null) {
			$this->Ln(5);
			$tauglichkeitInfo = $this->tauglichkeit->getTauglichkeitInfoFactory()
				->getTauglichkeitInfo($atemschutzgeraetetraeger);
			
			foreach ($tauglichkeitInfo->getRequiredsForAts2() as $nachweisartNachweisPair) {
				$this->Cell(40, 10, $nachweisartNachweisPair->getNachweisart()->__toString());
				if($nachweisartNachweisPair->getNachweis() == null) {
					$this->Cell(40, 10, 'Nicht vorhanden', 0, 1);
				} else {
					$this->Cell(40, 10, $nachweisartNachweisPair->getNachweis()->getDateFormatted().' gültig bis '.$nachweisartNachweisPair->getNachweis()->getExpiringDateFormatted(), 0, 1);
				}
			}
		}
	}
	
	private function addG26s(Atemschutzgeraetetraeger $atemschutzgeraetetraeger)
	{
		//g26s
		$this->SetY(25);
		$this->SetFont('helvetica', 'B', 12);
		$this->Ln(5);
		$this->Cell(0, 10, 'Untersuchungen nach G26', 0, 1);
		$this->Ln(5);
		
		$this->SetFont('helvetica', 'B', 11);
		$width = array(20, 30, 30, 0);
		
		//tableheader
		$this->Cell($width[0], 5, 'Gruppe', 1);
		$this->Cell($width[1], 5, 'Datum', 1);
		$this->Cell($width[2], 5, 'gültig bis', 1);
		$this->Cell($width[3], 5, 'Bemerkungen', 1, 1);
		
		$this->SetFont('helvetica', '', 10);
		foreach ($atemschutzgeraetetraeger->getG26s() as $g26)
		{
		  $this->Cell($width[0], 5, 'G26.'.$g26->getClassification(), 1);
		  $this->Cell($width[1], 5, $g26->getDateFormatted(), 1);
		  $this->Cell($width[2], 5, $g26->getDuedateFormatted(), 1);
		  $this->Cell($width[3], 5, $g26->getNotice(), 1, 1);
		}
	}
	
	private function addRecord(Atemschutzgeraetetraeger $atemschutzgeraetetraeger)
	{
		$this->SetFont('helvetica', 'B', 12);
		$this->Ln(5);
		$this->Cell(0, 10, 'Atemschutznachweis', 0, 1);
		$this->Ln(5);
		
		$this->SetFont('helvetica', 'B', 11);
		$width = array(25, 45, 25, 70, 10, 0);
		
		//tableheader
		$this->Cell($width[0], 5, 'Datum', 1);
		$this->Cell($width[1], 5, 'Nachweis', 1);
		$this->Cell($width[2], 5, 'Einsatzart', 1);
		$this->Cell($width[3], 5, 'Einsatzort', 1);
		$this->Cell($width[4], 5, 'Nr.', 1);
		$this->Cell($width[5], 5, 'Dauer', 1, 1);
		
		$this->SetFont('helvetica', '', 10);
		foreach ($atemschutzgeraetetraeger->getNachweise() as $nachweis)
		{
		  $this->Cell($width[0], 5, $nachweis->getDateFormatted(), 1);
		  $this->Cell($width[1], 5, $nachweis->getNachweisart(), 1);
		  $this->Cell($width[2], 5, $nachweis->getEinsatzart(), 1);
		  $this->Cell($width[3], 5, $nachweis->getLocation(), 1);
		  $this->Cell($width[4], 5, $nachweis->getEinsatznummer(), 1);
		  $this->Cell($width[5], 5, $nachweis->getTime(), 1, 1);
		}
	}
}