<?php
namespace Atemschutz\NachweisBundle\Test\Tauglichkeit;

use Atemschutz\NachweisBundle\Tauglichkeit\TauglichkeitInfo;

use Atemschutz\NachweisBundle\Entity\Nachweis;

use Atemschutz\NachweisBundle\Entity\Nachweisart;

use Atemschutz\NachweisBundle\Tauglichkeit\NachweisartNachweisPair;

class TauglichkeitInfoTest extends \PHPUnit_Framework_TestCase {
	
	public function testSettersGetters() {
		$over18 = true;
		$validAts1 = true;
		$validAts2 = true;
		
		$nachweisartAtemschutzstrecke = new Nachweisart();
		$nachweisartAtemschutzstrecke->setName("Atemschutzstrecke");
		$nachweisartAtemschutzstrecke->setRequiredFor(1);
		$nachweisartAtemschutzstrecke->setTimeValid(12);
		
		$nachweisartCsaUebung = new Nachweisart();
		$nachweisartCsaUebung->setName("CSA Übung");
		$nachweisartCsaUebung->setRequiredFor(2);
		$nachweisartCsaUebung->setTimeValid(12);
		
		$nachweisAts1 = new Nachweis();
		$nachweisAts1->setDate(new \DateTime());
		$nachweisAts1->setNachweisart($nachweisartAtemschutzstrecke);
		
		$nachweisAts2 = new Nachweis();
		$nachweisAts2->setDate(new \DateTime());
		$nachweisAts2->setNachweisart($nachweisartCsaUebung);
		
		$nachweisPairAts1 = new NachweisartNachweisPair($nachweisartAtemschutzstrecke, $nachweisAts1);
		$nachweisPairAts2 = new NachweisartNachweisPair($nachweisartCsaUebung, $nachweisAts2);
		
		$requiredAts1 = array($nachweisPairAts1);
		$requiredAts2 = array($nachweisPairAts2);
		
		$tauglichkeitInfo = new TauglichkeitInfo();
		$tauglichkeitInfo->setOver18($over18);
		$tauglichkeitInfo->setValidAts1($validAts1);
		$tauglichkeitInfo->setValidAts2($validAts2);
		$tauglichkeitInfo->setRequiredsForAts1($requiredAts1);
		$tauglichkeitInfo->setRequiredsForAts2($requiredAts2);
		
		$this->assertEquals($over18, $tauglichkeitInfo->isOver18());
		$this->assertEquals($validAts1, $tauglichkeitInfo->hasValidAts1());
		$this->assertEquals($validAts2, $tauglichkeitInfo->hasValidAts2());
		$this->assertEquals($requiredAts1, $tauglichkeitInfo->getRequiredsForAts1());
		$this->assertEquals($requiredAts2, $tauglichkeitInfo->getRequiredsForAts2());
	}
}