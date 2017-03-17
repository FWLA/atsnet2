<?php
namespace Atemschutz\NachweisBundle\Pdf;

use Atemschutz\NachweisBundle\Statistik\Jahresstatistik;

use Atemschutz\CoreBundle\Entity\User;

use Symfony\Component\Security\Core\SecurityContext;

class YearPdf extends \TCPDF {
	
	/**
	 * 
	 * @var User
	 */
	private $user;
	
	public function __construct(SecurityContext $securityContext) {
		parent::__construct();
		$this->user = $securityContext->getToken()->getUser();
	}
	
	/**
	 * 
	 */
	public function Header() {
		$this->Image('../src/Atemschutz/CoreBundle/Resources/public/images/logo.png', 140, 10, 100, 0);
		$this->SetY(10);
		$this->SetFont('helvetica', 'U', 16);
		$this->Cell(0, 10, 'Jahresstatistik');
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
	
	public function create(Jahresstatistik $jahresstatistik) {
		$this->SetCreator($this->user->__toString());
		$this->SetAuthor('ATS.net 2');
		$this->SetTitle('Jahresstatistik '.$jahresstatistik->getJahr());
		$this->SetSubject('Jahresstatistik '.$jahresstatistik->getJahr());
		
		$this->AddPage();
		$this->SetFont('helvetica', 'B', 14);
		$this->SetY(25);
		$this->Cell(0, 10, 'Jahresstatistik '.$jahresstatistik->getJahr(), 0, 1);
		$this->Ln(5);
		
		$this->SetFont('helvetica', 'B', 12);
		$this->Cell(0, 10, 'Lehrgänge', 0, 1);
		
		$this->SetFont('helvetica', '', 11);
		$this->Cell(70, 5, 'Atemschutzgeräteträgerlehrgang I:');
		$this->Cell(10, 5, $jahresstatistik->getLehrgaengeAts1(), 0, 1);
		$this->Cell(70, 5, 'Atemschutzgeräteträgerlehrgang II:');
		$this->Cell(10, 5, $jahresstatistik->getLehrgaengeAts2(), 0, 1);
		$this->addSum($jahresstatistik->getLehrgaengeAts1() + $jahresstatistik->getLehrgaengeAts2());
		
		$this->SetFont('helvetica', 'B', 12);
		$this->Cell(0, 10, 'Untersuchungen nach G26', 0, 1);
		
		$this->SetFont('helvetica', '', 11);
		$this->Cell(70, 5, 'Gerätegruppe 1:');
		$this->Cell(10, 5, $jahresstatistik->getG26_1(), 0, 1);
		$this->Cell(70, 5, 'Gerätegruppe 2:');
		$this->Cell(10, 5, $jahresstatistik->getG26_2(), 0, 1);
		$this->Cell(70, 5, 'Gerätegruppe 3:');
		$this->Cell(10, 5, $jahresstatistik->getG26_3(), 0, 1);
		$this->addSum($jahresstatistik->getG26_1() + $jahresstatistik->getG26_2() + $jahresstatistik->getG26_3());
		
		$this->SetFont('helvetica', 'B', 12);
		$this->Cell(0, 10, 'Erbrachte Nachweise', 0, 1);
		
		$this->SetFont('helvetica', '', 11);
		$sum = 0;
		foreach ($jahresstatistik->getNachweise() as $nachweis => $count) {
			$this->Cell(70, 5, $nachweis);
			$this->Cell(10, 5, $count, 0, 1);
			$sum += $count;
		}
		$this->addSum($sum);
		
		$this->SetFont('helvetica', 'B', 12);
		$this->Cell(0, 10, 'Gesamtzeit unter Atemschutz', 0, 1);
		
		$this->SetFont('helvetica', '', 11);
		$this->Cell(10, 5, $jahresstatistik->getMinutenAts().' Minuten = '.$jahresstatistik->getStundenAts().' Stunden', 0, 1);
		
		$this->Output('test.pdf', 'I');
	}
	
	private function addSum($sum) {
		$this->Cell(70, 5);
		$this->SetFont('helvetica', 'B');
		$this->Cell(10, 5, $sum, 0, 1);
		$this->SetFont('helvetica', '');
	}
}