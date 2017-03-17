<?php
namespace Atemschutz\NachweisBundle\Test\Entity;

use Atemschutz\CoreBundle\Entity\User;

use Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger;

use Atemschutz\NachweisBundle\Entity\Einsatzart;

use Atemschutz\NachweisBundle\Entity\Nachweisart;

use Atemschutz\NachweisBundle\Entity\Nachweis;

/**
 * @author Benjamin Ihrig
 */
class NachweisTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * tests getters and setters
	 */
	public function testSettersGetters() {
		$einsatzNummer = 112;
		$date = new \DateTime('2013-02-02');
		$location = 'Feuerwehr Lampertheim';
		$time = 25;
		$work = 'Gewöhnungsübung';
		$notice = 'Die Supernotiz!!';
		
		$nachweisart = new Nachweisart();
		$nachweisart->setName('Übung');
		$nachweisart->setRequiredFor(0);
		
		$einsatzart = new Einsatzart();
		$einsatzart->setName('Übung');
		
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		$atemschutzgeraetetraeger->setFirstname('Benjamin');
		$atemschutzgeraetetraeger->setLastname('Ihrig');
		$atemschutzgeraetetraeger->setBirthdate(new \DateTime('1990-01-11'));
		$atemschutzgeraetetraeger->setAts1(new \DateTime('2009-01-06'));
		
		$atemschutzgeraetewart = new User();
		$atemschutzgeraetewart->setFirstname('Uwe');
		$atemschutzgeraetewart->setLastname('Koch');
		$atemschutzgeraetewart->setEmail('uwe.k.koch@daimler.com');
		
		$nachweis = new Nachweis();
		$nachweis->setEinsatzNummer($einsatzNummer);
		$nachweis->setDate($date);
		$nachweis->setLocation($location);
		$nachweis->setTime($time);
		$nachweis->setWork($work);
		$nachweis->setNachweisart($nachweisart);
		$nachweis->setEinsatzart($einsatzart);
		$nachweis->setAtemschutzgeraetetraeger($atemschutzgeraetetraeger);
		$nachweis->setAtemschutzgeraetewart($atemschutzgeraetewart);
		$nachweis->setNotice($notice);
		
		$this->assertNull($nachweis->getId());
		$this->assertEquals($einsatzNummer, $nachweis->getEinsatzNummer());
		$this->assertEquals($date, $nachweis->getDate());
		$this->assertEquals($location, $nachweis->getLocation());
		$this->assertEquals($time, $nachweis->getTime());
		$this->assertEquals($work, $nachweis->getWork());
		$this->assertEquals($nachweisart, $nachweis->getNachweisart());
		$this->assertEquals($einsatzart, $nachweis->getEinsatzart());
		$this->assertEquals($atemschutzgeraetetraeger, $nachweis->getAtemschutzgeraetetraeger());
		$this->assertEquals($atemschutzgeraetewart, $nachweis->getAtemschutzgeraetewart());
		$this->assertEquals($notice, $nachweis->getNotice());
	}
	
	/**
	 * tests get date formatted
	 */
	public function testGetDateFormatted() {
		$nachweis = new Nachweis();
		$this->assertNull($nachweis->getDateFormatted());
		$nachweis->setDate(new \DateTime('2013-02-01'));
		$this->assertEquals('01.02.2013', $nachweis->getDateFormatted());
		$this->assertEquals('01.02.2013', $nachweis->getDateFormatted('d.m.Y'));
		$this->assertEquals('02/01/2013', $nachweis->getDateFormatted('m/d/Y'));
	}
	
	/**
	 * tests toString method
	 */
	public function testToString() {
		$nachweisart = new Nachweisart();
		$nachweisart->setName("Einsatz");
		
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		$atemschutzgeraetetraeger->setFirstname("Benjamin");
		$atemschutzgeraetetraeger->setLastname("Ihrig");
		
		$nachweis = new Nachweis();
		$nachweis->setDate(new \DateTime("2012-01-15"));
		$nachweis->setAtemschutzgeraetetraeger($atemschutzgeraetetraeger);
		$nachweis->setNachweisart($nachweisart);
		
		$this->assertEquals($nachweisart->__toString()." ".$nachweis->getDateFormatted()." (".$atemschutzgeraetetraeger->__toString().")", $nachweis->__toString());
	}
	
	/**
	 * tests getExpiringDate method
	 */
	public function testGetExpiringDate() {
		$nachweisart = new Nachweisart();
		$nachweisart->setName("Atemschutzstrecke");
		$nachweisart->setRequiredFor(1);
		$nachweisart->setTimeValid(12);
		
		$nachweis = new Nachweis();
		$nachweis->setDate(new \DateTime("2012-04-20"));
		$nachweis->setNachweisart($nachweisart);
		
		$expectedExpringDate = new \DateTime("2013-04-20");
		
		$this->assertEquals($expectedExpringDate, $nachweis->getExpiringDate());
		$this->assertEquals(new \DateTime("2012-04-20"), $nachweis->getDate());
		
		$nachweisart = new Nachweisart();
		$nachweisart->setName("Einsatz");
		$nachweisart->setRequiredFor(0);
		
		$nachweis = new Nachweis();
		$nachweis->setDate(new \DateTime("2012-04-20"));
		$nachweis->setNachweisart($nachweisart);
		
		$this->assertFalse($nachweis->getExpiringDate());
		$this->assertEquals(new \DateTime("2012-04-20"), $nachweis->getDate());
	}
	
	/**
	 * tests get expiring date formatted
	 */
	public function testGetExpiringDateFormatted() {
		$nachweisart = new Nachweisart();
		$nachweisart->setName("Atemschutzstrecke");
		$nachweisart->setRequiredFor(1);
		$nachweisart->setTimeValid(12);
		
		$nachweis = new Nachweis();
		$nachweis->setNachweisart($nachweisart);
		$nachweis->setDate(new \DateTime('2013-02-01'));
		$this->assertEquals('01.02.2014', $nachweis->getExpiringDateFormatted());
		$this->assertEquals('01.02.2014', $nachweis->getExpiringDateFormatted('d.m.Y'));
		$this->assertEquals('02/01/2014', $nachweis->getExpiringDateFormatted('m/d/Y'));
	}
	
	/**
	 * test isValid method
	 */
	public function testIsValid() {
		$nachweisart = new Nachweisart();
		$nachweisart->setName("Einsatz");
		$nachweisart->setRequiredFor(0);
		$nachweisart->setTimeValid(0);
		
		$nachweis = new Nachweis();
		$nachweis->setDate(new \DateTime());
		$nachweis->setNachweisart($nachweisart);
		
		$this->assertTrue($nachweis->isValid());

		$nachweisart = new Nachweisart();
		$nachweisart->setName("Atemschutzstrecke");
		$nachweisart->setRequiredFor(1);
		$nachweisart->setTimeValid(12);
		
		$date = new \DateTime();
		
		$nachweis = new Nachweis();
		$nachweis->setDate($date);
		$nachweis->setNachweisart($nachweisart);
		
		$this->assertTrue($nachweis->isValid());
		
		$timeInterval = new \DateInterval("P12M");
		$timeInterval->invert = 1;
		$nachweis->getDate()->add($timeInterval);
		
		$this->assertFalse($nachweis->isValid());
		
		$timeInterval = new \DateInterval("P1D");
		$nachweis->getDate()->add($timeInterval);
		
		$this->assertTrue($nachweis->isValid());
	}
	
	/**
	 * test ExpiresInLessThanOneMonth method
	 */
	public function testExpiresInLessThanOneMonth() {
		$nachweisart = new Nachweisart();
		$nachweisart->setName("Einsatz");
		$nachweisart->setRequiredFor(0);
		
		$nachweis = new Nachweis();
		$nachweis->setNachweisart($nachweisart);
		
		$this->assertFalse($nachweis->expiresInLessThanOneMonth());
		
		$nachweisart = new Nachweisart();
		$nachweisart->setName("Atemschutzstrecke");
		$nachweisart->setRequiredFor(1);
		$nachweisart->setTimeValid(12);
		
		$nachweis = new Nachweis();
		$nachweis->setNachweisart($nachweisart);
		
		$date = new \DateTime();
		$dateInterval = new \DateInterval("P12M");
		$dateInterval->invert = 1;
		$date->add($dateInterval);
		$nachweis->setDate($date);
		
		$this->assertFalse($nachweis->expiresInLessThanOneMonth());
		
		$dateInterval = new \DateInterval("P25D");
		$date->add($dateInterval);
		$nachweis->setDate($date);
		
		$this->assertTrue($nachweis->expiresInLessThanOneMonth());
		
		$dateInterval = new \DateInterval("P25D");
		$date->add($dateInterval);
		$nachweis->setDate($date);
		
		$this->assertFalse($nachweis->expiresInLessThanOneMonth());
	}
}