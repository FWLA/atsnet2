<?php
namespace Atemschutz\NachweisBundle\Pdf;

use Doctrine\Bundle\DoctrineBundle\Registry;

use Atemschutz\CoreBundle\Entity\User;
use Atemschutz\NachweisBundle\Entity\Nachweis;
use Symfony\Component\Security\Core\SecurityContext;

class NachweisPdf extends \TCPDF {
	
	/**
	 * 
	 * @var User
	 */
	private $user;
	
	/**
	 * 
	 * @var Registry
	 */
	private $doctrine;
	

	public function __construct(SecurityContext $securityContext, Registry $doctrine) {
		parent::__construct();
		$this->user = $securityContext->getToken()->getUser();
		$this->doctrine = $doctrine;
	}

	
	/**
	 * 
	 */
	public function Header() {
		$this->Image('../src/Atemschutz/CoreBundle/Resources/public/images/logo.png', 140, 10, 100, 0);
		$this->SetY(10);
		$this->SetFont('helvetica', 'U', 16);
		$this->Cell(0, 10, 'Nachweis Einsatz');
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

	public function create(Nachweis $nachweis) {
		$this->SetCreator($this->user->__toString());
		$this->SetAuthor('ATS.net 2');
		$this->SetTitle('Nachweis Einsatz');
		$this->SetSubject('Nachweis Einsatz');
		
		$this->addGenericInformation($nachweis);
		
		$this->addAtemschutzgeraetetraegers($nachweis);
		
		$this->Output('test.pdf', 'I');
	}
	
	private function addGenericInformation(Nachweis $nachweis) {
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
		$this->Cell(40, 10, 'Datum:');
		$this->Cell(40, 10, $nachweis->getDateFormatted(), 0, 1);
		// ort
		$this->Cell(40, 10, 'Ort:');
		$this->Cell(40, 10, $nachweis->getLocation(), 0, 1);
		// nachweisart
		$this->Cell(40, 10, 'Nachweisart:');
		$this->Cell(40, 10, $nachweis->getNachweisart()->__toString(), 0, 1);
		// einsatzart
		$this->Cell(40, 10, 'Einsatzart:');
		$this->Cell(40, 10, $nachweis->getEinsatzart()->__toString(), 0, 1);
		// einsatznummer
		$this->Cell(40, 10, 'Einsatznummer:');
		$this->Cell(40, 10, $nachweis->getEinsatzNummer(), 0, 1);
	}
	
	private function addAtemschutzgeraetetraegers(Nachweis $nachweis) {
		$otherNachweise = $this->doctrine
			->getRepository('AtemschutzNachweisBundle:Nachweis')
			->findNachweisEqualDateAndLocation($nachweis);

		//g26s
// 		$this->SetY(25);
		$this->SetFont('helvetica', 'B', 12);
		$this->Ln(5);
		$this->Cell(0, 10, 'Eingesetzte Kräfte', 0, 1);
		$this->Ln(5);
		
		$this->SetFont('helvetica', 'B', 11);
		$width = array(60, 30, 60, 25);
		
		//tableheader
		$this->Cell($width[0], 5, 'Atemschutzgeräteträger', 1);
		$this->Cell($width[1], 5, 'Nachweisart', 1);
		$this->Cell($width[2], 5, 'Tätigkeit', 1);
		$this->Cell($width[3], 5, 'Einsatzzeit', 1, 1);
		
		$this->SetFont('helvetica', '', 10);
		foreach ($otherNachweise as $nachweis)
		{
		  $this->Cell($width[0], 5, $nachweis->getAtemschutzgeraetetraeger()->__toString(), 1);
		  $this->Cell($width[1], 5, $nachweis->getNachweisart()->__toString(), 1);
		  $this->Cell($width[2], 5, $nachweis->getWork(), 1);
		  $this->Cell($width[3], 5, $nachweis->getTime().' min', 1, 1);
		}
	}
}