<?php
namespace Atemschutz\NachweisBundle\Pdf;

use Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger;

use Atemschutz\NachweisBundle\Entity\G26;

use Atemschutz\NachweisBundle\Tauglichkeit\Tauglichkeit;

use Symfony\Component\Security\Core\SecurityContext;

use Atemschutz\CoreBundle\Entity\User;

use Doctrine\Bundle\DoctrineBundle\Registry;

class ReportPdf extends \TCPDF {

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
	
	/**
	 * 
	 * @var Tauglichkeit
	 */
	private $tauglichkeit;
	
	public function __construct(SecurityContext $securityContext, Registry $doctrine, Tauglichkeit $tauglichkeit) {
		parent::__construct();
		$this->user = $securityContext->getToken()->getUser();
		$this->doctrine = $doctrine;
		$this->tauglichkeit = $tauglichkeit;
	}
	
	/**
	 * 
	 */
	public function Header() {
		$this->Image('../src/Atemschutz/CoreBundle/Resources/public/images/logo.png', 140, 10, 100, 0);
		$this->SetY(10);
		$this->SetFont('helvetica', 'U', 16);
		$this->Cell(0, 10, 'Bericht Atemschutzgeräteträger');
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
	
	public function create() {
		$this->SetCreator($this->user->__toString());
		$this->SetAuthor('ATS.net 2');
		$this->SetTitle('Bericht Atemschutzgeräteträger');
		$this->SetSubject('Bericht Atemschutzgeräteträger');
		
		$this->addAtemschutzgeraetetraeger();
		
		$this->Output('test.pdf', 'I');
	}
	
	private function addAtemschutzgeraetetraeger() {
		$atemschutzgeraetetraegers = $this->doctrine
			->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
			->findAllActiveOrderedByName();
		
		$this->beginNewPage();
		
		foreach ($atemschutzgeraetetraegers as $atemschutzgeraetetraeger) {
			
			// decide to begin new page
			if ($this->GetY() > 270 - $this->getSpacePerAtemschutzgeraetetraeger($atemschutzgeraetetraeger)) {
				$this->beginNewPage();
			}
			
			$this->SetFont('helvetica', 'B', 12);
			$this->Cell(60, 10, $atemschutzgeraetetraeger, 0, 1);
			
			$this->SetFont('helvetica', '', 10);
			// g26
			$g26 = $atemschutzgeraetetraeger->getLatestValidG26();
			if($g26 == null) {
				$this->drawRedBox();
				$this->Cell(60, 5, 'G26');
				$this->Cell(60, 5, 'nicht vorhanden', 0, 1);
			} else {
				if($g26->expiresInLessThanOneMonth()) {
					$this->drawYellowBox();
				} else {
					$this->drawGreenBox();
				}
				$this->Cell(60, 5, 'G26');
				$this->Cell(60, 5, 'gültig bis '.$g26->getDueDateFormatted(), 0, 1);
			}
			
			$tauglichkeitInfo = $this->tauglichkeit
				->getTauglichkeitInfoFactory()
				->getTauglichkeitInfo($atemschutzgeraetetraeger);
			
			// ATS 1
			foreach ($tauglichkeitInfo->getRequiredsForAts1() as $nachweisartNachweisPair) {
				if ($nachweisartNachweisPair->getNachweis() == null) {
					$this->drawRedBox();
					$this->Cell(60, 5, $nachweisartNachweisPair->getNachweisart()->__toString());
					$this->Cell(60, 5, 'nicht vorhanden', 0, 1);
				} else {
					if (!$nachweisartNachweisPair->getNachweis()->isValid()) {
						$this->drawRedBox();
					} else if ($nachweisartNachweisPair->getNachweis()->expiresInLessThanOneMonth()) {
						$this->drawYellowBox();
					} else {
						$this->drawGreenBox();
					}
					$this->Cell(60, 5, $nachweisartNachweisPair->getNachweisart()->__toString());
					$this->Cell(60, 5, 'gültig bis '.$nachweisartNachweisPair->getNachweis()->getExpiringDateFormatted(), 0, 1);
				}
			}

			// ATS 2
			if ($atemschutzgeraetetraeger->getAts2() != null) {
				foreach ($tauglichkeitInfo->getRequiredsForAts2() as $nachweisartNachweisPair) {
					if ($nachweisartNachweisPair->getNachweis() == null) {
						$this->drawRedBox();
						$this->Cell(60, 5, $nachweisartNachweisPair->getNachweisart()->__toString());
						$this->Cell(60, 5, 'nicht vorhanden', 0, 1);
					} else {
						if (!$nachweisartNachweisPair->getNachweis()->isValid()) {
							$this->drawRedBox();
						} else if ($nachweisartNachweisPair->getNachweis()->expiresInLessThanOneMonth()) {
							$this->drawYellowBox();
						} else {
							$this->drawGreenBox();
						}
						$this->Cell(60, 5, $nachweisartNachweisPair->getNachweisart()->__toString());
						$this->Cell(60, 5, 'gültig bis '.$nachweisartNachweisPair->getNachweis()->getExpiringDateFormatted(), 0, 1);
					}
				}
			}
		}
	}
	
	private function beginNewPage() {
		$this->AddPage();
		$this->SetY(25);
	}
	
	private function drawRedBox() {
		$this->SetFillColor(255, 0, 0);
		$this->Cell(5, 4, '', 0, 0, '', true);
		$this->SetFillColor(255, 255, 255);
		$this->Cell(5, 5);
	}
	
	private function drawYellowBox() {
		$this->SetFillColor(255, 255, 0);
		$this->Cell(5, 4, '', 0, 0, '', true);
		$this->SetFillColor(255, 255, 255);
		$this->Cell(5, 5);
	}
	
	private function drawGreenBox() {
		$this->SetFillColor(0, 255, 0);
		$this->Cell(5, 4, '', 0, 0, '', true);
		$this->SetFillColor(255, 255, 255);
		$this->Cell(5, 5);
	}
	
	private function getSpacePerAtemschutzgeraetetraeger(Atemschutzgeraetetraeger $atemschutzgeraetetraeger) {
		// 10 title
		// 5 g26
		// 5 per nachweis
		
		$tauglichkeitInfo = $this->tauglichkeit
			->getTauglichkeitInfoFactory()
			->getTauglichkeitInfo($atemschutzgeraetetraeger);
		
		$countAts1 = count($tauglichkeitInfo->getRequiredsForAts1());
		$countAts2 = count($tauglichkeitInfo->getRequiredsForAts2());
		
		$spaceNeeded = 10 + 5 + (($countAts1 + $countAts2) * 5);
		
		return $spaceNeeded;
	}
}