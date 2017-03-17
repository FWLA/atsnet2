<?php
namespace Atemschutz\NachweisBundle\Test\Statistik;

use Atemschutz\NachweisBundle\Statistik\Jahresstatistik;

class JahresstatistikTest extends \PHPUnit_Framework_TestCase {
	
	public function testSettersGetters() {
		$jahr = 2012;
		$lehrgaengeAts1 = 15;
		$lehrgaengeAts2 = 4;
		$g26_1 = 2;
		$g26_2 = 4;
		$g26_3 = 12;
		
		$minutenAts = 600;
		
		$nachweise = array("Einsatz" => 250, "Atemschutzstrecke" => 26);
		
		$jahresstatistik = new Jahresstatistik();
		$jahresstatistik->setJahr($jahr);
		$jahresstatistik->setLehrgaengeAts1($lehrgaengeAts1);
		$jahresstatistik->setLehrgaengeAts2($lehrgaengeAts2);
		$jahresstatistik->setG26_1($g26_1);
		$jahresstatistik->setG26_2($g26_2);
		$jahresstatistik->setG26_3($g26_3);
		$jahresstatistik->setMinutenAts($minutenAts);
		
		foreach ($nachweise as $nachweis => $anzahl) {
			$jahresstatistik->addNachweis($nachweis, $anzahl);
		}
		
		$this->assertEquals($jahr, $jahresstatistik->getJahr());
		$this->assertEquals($lehrgaengeAts1, $jahresstatistik->getLehrgaengeAts1());
		$this->assertEquals($lehrgaengeAts2, $jahresstatistik->getLehrgaengeAts2());
		$this->assertEquals($g26_1, $jahresstatistik->getG26_1());
		$this->assertEquals($g26_2, $jahresstatistik->getG26_2());
		$this->assertEquals($g26_3, $jahresstatistik->getG26_3());
		$this->assertEquals($minutenAts, $jahresstatistik->getMinutenAts());
		$this->assertEquals($minutenAts / 60, $jahresstatistik->getStundenAts());
		$nachweiseRet = $jahresstatistik->getNachweise();
		$this->assertEquals(2, count($nachweiseRet));
		$this->assertEquals($nachweise["Einsatz"], $nachweiseRet["Einsatz"]);
		$this->assertEquals($nachweise["Atemschutzstrecke"], $nachweiseRet["Atemschutzstrecke"]);
	}
}