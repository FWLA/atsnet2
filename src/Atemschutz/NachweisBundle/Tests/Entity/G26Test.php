<?php
namespace Atemschutz\NachweisBundle\Test\Entity;

use Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger;

use Atemschutz\CoreBundle\Entity\User;

use Atemschutz\NachweisBundle\Entity\G26;

/**
 * @author Benjamin Ihrig
 */
class G26Test extends \PHPUnit_Framework_TestCase {
	
	/**
	 * tests getters and setters of G26
	 */
	public function testSettersGetters() {
		$date = new \DateTime('2013-02-01');
		$duedate = new \DateTime('2016-02-01');
		$valid = true;
		$classification = 3;
		$notice = "A Notice for the G26.";
		
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		$atemschutzgeraetetraeger->setFirstname('Benjamin');
		$atemschutzgeraetetraeger->setLastname('Ihrig');
		$atemschutzgeraetetraeger->setBirthdate(new \DateTime('1990-01-11'));
		$atemschutzgeraetetraeger->setAts1(new \DateTime('2009-01-06'));
		
		$atemschutzgeraetewart = new User();
		$atemschutzgeraetewart->setFirstname('Uwe');
		$atemschutzgeraetewart->setLastname('Koch');
		$atemschutzgeraetewart->setEmail('uwe.k.koch@daimler.com');
		
		$g26 = new G26();
		$g26->setDate($date);
		$g26->setDuedate($duedate);
		$g26->setValid($valid);
		$g26->setClassification($classification);
		$g26->setAtemschutzgeraetetraeger($atemschutzgeraetetraeger);
		$g26->setAtemschutzgeraetewart($atemschutzgeraetewart);
		$g26->setNotice($notice);
		
		$this->assertNull($g26->getId());
		$this->assertEquals($date, $g26->getDate());
		$this->assertEquals($duedate, $g26->getDuedate());
		$this->assertEquals($valid, $g26->getValid());
		$this->assertEquals($classification, $g26->getClassification());
		$this->assertEquals($atemschutzgeraetetraeger, $g26->getAtemschutzgeraetetraeger());
		$this->assertEquals($atemschutzgeraetewart, $g26->getAtemschutzgeraetewart());
		$this->assertEquals($notice, $g26->getNotice());
	}
	
	/**
	 * tests get date formatted
	 */
	public function testGetDateFormatted() {
		$g26 = new G26();
		$this->assertNull($g26->getDateFormatted());
		$g26->setDate(new \DateTime('2013-02-01'));
		$this->assertEquals('01.02.2013', $g26->getDateFormatted());
		$this->assertEquals('01.02.2013', $g26->getDateFormatted('d.m.Y'));
		$this->assertEquals('02/01/2013', $g26->getDateFormatted('m/d/Y'));
	}
	
	/**
	 * tests get duedate formatted
	 */
	public function testGetDuedateFormatted() {
		$g26 = new G26();
		$this->assertNull($g26->getDueDateFormatted());
		$g26->setDuedate(new \DateTime('2016-02-01'));
		$this->assertEquals('01.02.2016', $g26->getDueDateFormatted());
		$this->assertEquals('01.02.2016', $g26->getDueDateFormatted('d.m.Y'));
		$this->assertEquals('02/01/2016', $g26->getDueDateFormatted('m/d/Y'));
	}
	
	/**
	 * tests isExpired method
	 */
	public function isExpired() {
		$g26 = new G26();
		$currentDate = new \DateTime();
		
		$currentDate->add('M1D');
		$g26->setDuedate($currentDate);
		$this->assertTrue($g26->isExpired());
		
		$currentDate->add('M1D');
		$g26->setDuedate($currentDate);
		$this->assertFalse($g26->isExpired());
		
		$currentDate->add('M1D');
		$g26->setDuedate($currentDate);
		$this->assertFalse($g26->isExpired());
	}
	
	/**
	 * test ExpiresInLessThanOneMonth method
	 */
	public function testExpiresInLessThanOneMonth() {
		$g26 = new G26();
		$g26->setValid(true);
		
		$date = new \DateTime();
		$dateInterval = new \DateInterval("P25D");
		$date->add($dateInterval);
		$g26->setDuedate($date);
		
		$this->assertTrue($g26->expiresInLessThanOneMonth());
		
		$dateInterval = new \DateInterval("P15D");
		$dateInterval->invert = 1;
		$date->add($dateInterval);
		
		$this->assertTrue($g26->expiresInLessThanOneMonth());
		
		$dateInterval = new \DateInterval("P40D");
		$date->add($dateInterval);
		
		$this->assertFalse($g26->expiresInLessThanOneMonth());
	}
}