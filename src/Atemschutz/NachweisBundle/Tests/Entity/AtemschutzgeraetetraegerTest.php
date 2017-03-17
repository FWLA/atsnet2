<?php
namespace Atemschutz\NachweisBundle\Test\Entity;

use Atemschutz\NachweisBundle\Entity\Nachweisart;

use Atemschutz\NachweisBundle\Entity\Nachweis;

use Atemschutz\NachweisBundle\Entity\G26;

use Atemschutz\CoreBundle\Entity\Organisation;

use Atemschutz\CoreBundle\Entity\User;

use Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger;

/**
 * @author Benjamin Ihrig
 */
class AtemschutzgeraetetraegerTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * tests setters and getters of atemschutzgeräteträger
	 */
	public function testSettersGetters() {
		$firstname = 'Benjamin';
		$lastname = 'Organisation';
		$birthdate = new \DateTime('1990-01-11');
		$ats1 = new \DateTime('2009-01-06');
		$ats2 = new \DateTime('2010-02-03');
		$isActive = true;
		
		$user = new User();
		$user->setFirstname('Benjamin');
		$user->setLastname('Ihrig');
		$user->setEmail('benjamin.ihrig@gmail.com');
		
		$organisation = new Organisation();
		$organisation->setName('Feuerwehr Lampertheim-Mitte');
		
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		
		$atemschutzgeraetetraeger->setFirstname($firstname);
		$atemschutzgeraetetraeger->setLastname($lastname);
		$atemschutzgeraetetraeger->setBirthdate($birthdate);
		$atemschutzgeraetetraeger->setAts1($ats1);
		$atemschutzgeraetetraeger->setAts2($ats2);
		$atemschutzgeraetetraeger->setIsActive($isActive);
		$atemschutzgeraetetraeger->setUser($user);
		$atemschutzgeraetetraeger->setOrganisation($organisation);
		
		$this->assertNull($atemschutzgeraetetraeger->getId());
		$this->assertEquals($firstname, $atemschutzgeraetetraeger->getFirstname());
		$this->assertEquals($lastname, $atemschutzgeraetetraeger->getLastname());
		$this->assertEquals($birthdate, $atemschutzgeraetetraeger->getBirthdate());
		$this->assertEquals($ats1, $atemschutzgeraetetraeger->getAts1());
		$this->assertEquals($ats2, $atemschutzgeraetetraeger->getAts2());
		$this->assertEquals($isActive, $atemschutzgeraetetraeger->getIsActive());
		$this->assertEquals($user, $atemschutzgeraetetraeger->getUser());
		$this->assertEquals($organisation, $atemschutzgeraetetraeger->getOrganisation());
	}
	
	/**
	 * test birtdate formatting
	 */
	public function testGetBirthdateFormatted() {
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		$this->assertNull($atemschutzgeraetetraeger->getBirthdateFormatted());
		$atemschutzgeraetetraeger->setBirthdate(new \DateTime('1990-01-11'));
		$this->assertEquals('11.01.1990', $atemschutzgeraetetraeger->getBirthdateFormatted());
		$this->assertEquals('11.01.1990', $atemschutzgeraetetraeger->getBirthdateFormatted('d.m.Y'));
		$this->assertEquals('01/11/1990', $atemschutzgeraetetraeger->getBirthdateFormatted('m/d/Y'));
	}
	
	/**
	 * tests ats1 formatting
	 */
	public function testGetAts1Formatted() {
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		$this->assertNull($atemschutzgeraetetraeger->getAts1Formatted());
		$atemschutzgeraetetraeger->setAts1(new \DateTime('2009-01-06'));
		$this->assertEquals('06.01.2009', $atemschutzgeraetetraeger->getAts1Formatted());
		$this->assertEquals('06.01.2009', $atemschutzgeraetetraeger->getAts1Formatted('d.m.Y'));
		$this->assertEquals('01/06/2009', $atemschutzgeraetetraeger->getAts1Formatted('m/d/Y'));
	}
	
	/**
	 * tests ats2 formatting
	 */
	public function testGetAts2Formatted() {
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		$this->assertNull($atemschutzgeraetetraeger->getAts2Formatted());
		$atemschutzgeraetetraeger->setAts2(new \DateTime('2010-02-03'));
		$this->assertEquals('03.02.2010', $atemschutzgeraetetraeger->getAts2Formatted());
		$this->assertEquals('03.02.2010', $atemschutzgeraetetraeger->getAts2Formatted('d.m.Y'));
		$this->assertEquals('02/03/2010', $atemschutzgeraetetraeger->getAts2Formatted('m/d/Y'));
	}
	
	/**
	 * tests to string method
	 */
	public function testToString() {
		$firstname = 'Benjamin';
		$lastname = 'Ihrig';
		$isActive = true;
		
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
	
		$atemschutzgeraetetraeger->setFirstname($firstname);
		$atemschutzgeraetetraeger->setLastname($lastname);
		$atemschutzgeraetetraeger->setIsActive($isActive);
	
		$this->assertEquals('Ihrig, Benjamin', $atemschutzgeraetetraeger->__toString());
	}
	
	/**
	 * tests isOver18 method
	 */
	public function testIsOver18() {
		$currentDate = new \DateTime();
		
		$interval = new \DateInterval('P18Y');
		$interval->invert = 1;
		$currentDate->add($interval);
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		
		$interval = new \DateInterval('P1D');
		$interval->invert = 1;
		$currentDate->add($interval);
		$atemschutzgeraetetraeger->setBirthdate($currentDate);
		$this->assertTrue($atemschutzgeraetetraeger->isOver18());
		
		$interval = new \DateInterval('P1D');
		$currentDate->add($interval);
		$atemschutzgeraetetraeger->setBirthdate($currentDate);
		$this->assertTrue($atemschutzgeraetetraeger->isOver18());
		
		$interval = new \DateInterval('P1D');
		$currentDate->add($interval);
		$atemschutzgeraetetraeger->setBirthdate($currentDate);
		$this->assertFalse($atemschutzgeraetetraeger->isOver18());
	}
	
	/**
	 * tests hasValidG26 method
	 */
	public function testHasValidG26() {
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		$currentDate = new \DateTime();
		
		$this->assertFalse($atemschutzgeraetetraeger->hasValidG26());
		
		$g26 = new G26();
		$dateInterval = new \DateInterval('P1D');
		$dateInterval->invert = 1;
		$date = $currentDate->add($dateInterval);
		$g26->setDuedate($date);
		$atemschutzgeraetetraeger->addG26($g26);
		
		$this->assertFalse($atemschutzgeraetetraeger->hasValidG26());
		
		$g26 = new G26();
		$dateInterval = new \DateInterval('P2D');
		$date = $currentDate->add($dateInterval);
		$g26->setDuedate($date);
		$g26->setClassification(2);
		$atemschutzgeraetetraeger->addG26($g26);
		
		$this->assertFalse($atemschutzgeraetetraeger->hasValidG26());
		
		$g26 = new G26();
		$dateInterval = new \DateInterval('P2D');
		$date = $currentDate->add($dateInterval);
		$g26->setDuedate($date);
		$g26->setClassification(3);
		$atemschutzgeraetetraeger->addG26($g26);
		
		$this->assertTrue($atemschutzgeraetetraeger->hasValidG26());
		
		$g26 = new G26();
		$dateInterval = new \DateInterval('P2D');
		$date = $currentDate->add($dateInterval);
		$g26->setDuedate($date);
		$g26->setValid(false);
		$g26->setClassification(3);
		$atemschutzgeraetetraeger->addG26($g26);
		
		$this->assertTrue($atemschutzgeraetetraeger->hasValidG26());
	}
	
	/**
	 * tests G26 methods
	 */
	public function testG26s() {
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
	
		$g26 = new G26();
		$g26->setDate(new \DateTime());
		$g26->setDuedate(new \DateTime());
	
		$this->assertNotContains($g26, $atemschutzgeraetetraeger->getG26s());
		$atemschutzgeraetetraeger->addG26($g26);
		$this->assertContains($g26, $atemschutzgeraetetraeger->getG26s());
		$atemschutzgeraetetraeger->removeG26($g26);
		$this->assertNotContains($g26, $atemschutzgeraetetraeger->getG26s());
	}
	
	/**
	 * tests Nachweis methods
	 */
	public function testNachweise() {
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
	
		$nachweis = new Nachweis();
		$nachweis->setDate(new \DateTime());
		$nachweis->setLocation('Feuerwehr Lampertheim');
	
		$this->assertNotContains($nachweis, $atemschutzgeraetetraeger->getNachweise());
		$atemschutzgeraetetraeger->addNachweise($nachweis);
		$this->assertContains($nachweis, $atemschutzgeraetetraeger->getNachweise());
		$atemschutzgeraetetraeger->removeNachweise($nachweis);
		$this->assertNotContains($nachweis, $atemschutzgeraetetraeger->getNachweise());
	}
	
	/**
	 * tests GetLatestValidG26 method
	 */
	public function testGetLatestValidG26() {
		
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		
		$this->assertNull($atemschutzgeraetetraeger->getLatestValidG26());
		
		$invalidG26 = new G26();
		$invalidG26->setDate(new \DateTime("2010-01-25"));
		$invalidG26->setDuedate(new \DateTime("2013-01-25"));
		$invalidG26->setValid(true);
		$invalidG26->setClassification(3);
		$atemschutzgeraetetraeger->addG26($invalidG26);
		
		$this->assertNull($atemschutzgeraetetraeger->getLatestValidG26());

		$date = new \DateTime();
		
		$middleDate = clone $date;
		$middleDate->add(new \DateInterval("P1D"));
		$middleDueDate = clone $middleDate;
		$middleDueDate->add(new \DateInterval("P1Y"));
		$validG26Middle = new G26();
		$validG26Middle->setDate($middleDate);
		$validG26Middle->setDuedate($middleDueDate);
		$validG26Middle->setValid(true);
		$validG26Middle->setClassification(3);
		$atemschutzgeraetetraeger->addG26($validG26Middle);
		
		$this->assertEquals($validG26Middle, $atemschutzgeraetetraeger->getLatestValidG26());
		
		$earlyDate = clone $date;
		$earlyDueDate = clone $earlyDate;
		$earlyDueDate->add(new \DateInterval("P1Y"));
		$validG26Early = new G26();
		$validG26Early->setDate($earlyDate);
		$validG26Early->setDuedate($earlyDueDate);
		$validG26Early->setValid(true);
		$validG26Early->setClassification(3);
		$atemschutzgeraetetraeger->addG26($validG26Early);
		
		$this->assertEquals($validG26Middle, $atemschutzgeraetetraeger->getLatestValidG26());
		
		$lateDate = clone $date;
		$lateDate->add(new \DateInterval("P2D"));
		$lateDueDate = clone $lateDate;
		$lateDueDate->add(new \DateInterval("P1Y"));
		$validG26Late = new G26();
		$validG26Late->setDate($lateDate);
		$validG26Late->setDuedate($lateDueDate);
		$validG26Late->setValid(true);
		$validG26Late->setClassification(3);
		$atemschutzgeraetetraeger->addG26($validG26Late);
		
		$this->assertEquals($validG26Late, $atemschutzgeraetetraeger->getLatestValidG26());
	}
	
	/**
	 * test getLatestNachweisByNachweisart method
	 */
	public function testGetLatestNachweisByNachweisart() {
		$nachweisartEinsatz = new Nachweisart();
		$nachweisartEinsatz->setName("Einsatz");
		
		$nachweisartTraining = new Nachweisart();
		$nachweisartTraining->setName("Training");
		
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		
		$this->assertNull($atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartEinsatz));
		$this->assertNull($atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartTraining));
		
		$date = new \DateTime();
		
		$dateEinsatzMiddle = clone $date;
		$dateEinsatzMiddle->add(new \DateInterval("P1D"));
		$nachweisEinsatzMiddle = new Nachweis();
		$nachweisEinsatzMiddle->setDate($dateEinsatzMiddle);
		$nachweisEinsatzMiddle->setNachweisart($nachweisartEinsatz);
		$atemschutzgeraetetraeger->addNachweise($nachweisEinsatzMiddle);
		
		$this->assertEquals($nachweisEinsatzMiddle, $atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartEinsatz));
		$this->assertNull($atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartTraining));
		
		$dateEinsatzEarly = clone $date;
		$nachweisEinsatzEarly = new Nachweis();
		$nachweisEinsatzEarly->setDate($dateEinsatzEarly);
		$nachweisEinsatzEarly->setNachweisart($nachweisartEinsatz);
		$atemschutzgeraetetraeger->addNachweise($nachweisEinsatzEarly);
		
		$this->assertEquals($nachweisEinsatzMiddle, $atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartEinsatz));
		$this->assertNull($atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartTraining));
		
		$dateEinsatzLate = clone $date;
		$dateEinsatzLate->add(new \DateInterval("P2D"));
		$nachweisEinsatzLate = new Nachweis();
		$nachweisEinsatzLate->setDate($dateEinsatzLate);
		$nachweisEinsatzLate->setNachweisart($nachweisartEinsatz);
		$atemschutzgeraetetraeger->addNachweise($nachweisEinsatzLate);
		
		$this->assertEquals($nachweisEinsatzLate, $atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartEinsatz));
		$this->assertNull($atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartTraining));
		
		$dateTrainingMiddle = clone $date;
		$dateTrainingMiddle->add(new \DateInterval("P1D"));
		$nachweisTrainingMiddle = new Nachweis();
		$nachweisTrainingMiddle->setDate($dateTrainingMiddle);
		$nachweisTrainingMiddle->setNachweisart($nachweisartTraining);
		$atemschutzgeraetetraeger->addNachweise($nachweisTrainingMiddle);
		
		$this->assertEquals($nachweisEinsatzLate, $atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartEinsatz));
		$this->assertEquals($nachweisTrainingMiddle, $atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartTraining));
		
		$dateTrainingEarly = clone $date;
		$nachweisTrainingEarly = new Nachweis();
		$nachweisTrainingEarly->setDate($dateTrainingEarly);
		$nachweisTrainingEarly->setNachweisart($nachweisartTraining);
		$atemschutzgeraetetraeger->addNachweise($nachweisTrainingEarly);
		
		$this->assertEquals($nachweisEinsatzLate, $atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartEinsatz));
		$this->assertEquals($nachweisTrainingMiddle, $atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartTraining));
		
		$dateTrainingLate = clone $date;
		$dateTrainingLate->add(new \DateInterval("P2D"));
		$nachweisTrainingLate = new Nachweis();
		$nachweisTrainingLate->setDate($dateTrainingLate);
		$nachweisTrainingLate->setNachweisart($nachweisartTraining);
		$atemschutzgeraetetraeger->addNachweise($nachweisTrainingLate);
		
		$this->assertEquals($nachweisEinsatzLate, $atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartEinsatz));
		$this->assertEquals($nachweisTrainingLate, $atemschutzgeraetetraeger->getLatestNachweisByNachweisart($nachweisartTraining));
	}
}