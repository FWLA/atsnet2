<?php
namespace Atemschutz\NachweisBundle\Test\Entity;

use Atemschutz\NachweisBundle\Tauglichkeit\RequiredFor;

use Atemschutz\NachweisBundle\Entity\Nachweisart;

/**
 * @author Benjamin Ihrig
 */
class NachweisartTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * tests getters and setters
	 */
	public function testSettersGetters() {
		$nachweisart = new Nachweisart();
		
		$name = 'Atemschutzstrecke';
		$requiredFor = RequiredFor::getRequiredFors()[1];
		$timeValid = 12;
		
		$nachweisart->setName($name);
		$nachweisart->setRequiredFor($requiredFor);
		$nachweisart->setTimeValid($timeValid);
		
		$this->assertNull($nachweisart->getId());
		$this->assertEquals($name, $nachweisart->getName());
		$this->assertEquals($requiredFor, $nachweisart->getRequiredFor());
		$this->assertEquals($timeValid, $nachweisart->getTimeValid());
	}
	
	/**
	 * tests toString
	 */
	public function testToString() {
		$nachweisart = new Nachweisart();
		$this->assertNull($nachweisart->__toString());
		$name = 'Atemschutzstrecke';
		$nachweisart->setName($name);
		$this->assertEquals($name, $nachweisart->__toString());
	}
	
	/**
	 * tests getRequiredForTitle function
	 */
	public function testGetRequiredForTitle() {
		$requiredFors = RequiredFor::getRequiredFors();
		$nachweisart = new Nachweisart();
		
		foreach ($requiredFors as $key => $requiredFor) {
			$nachweisart->setRequiredFor($key);
			
			$this->assertEquals($requiredFor, $nachweisart->getRequiredForTitle());
		}
	}
	
	/**
	 * tests get date interval method
	 */
	public function testGetDateInterval() {
		$nachweisart = new Nachweisart();
		
		$nachweisart->setTimeValid(0);
		$dateInterval = $nachweisart->getDateInterval();
		$this->assertEquals(0, $dateInterval->format('%m'));
		
		$nachweisart->setTimeValid(12);
		$dateInterval = $nachweisart->getDateInterval();
		$this->assertEquals(12, $dateInterval->format('%m'));
		
		$nachweisart->setTimeValid(24);
		$dateInterval = $nachweisart->getDateInterval();
		$this->assertEquals(24, $dateInterval->format('%m'));
		
		$nachweisart->setTimeValid(7);
		$dateInterval = $nachweisart->getDateInterval();
		$this->assertEquals(7, $dateInterval->format('%m'));
		
		$nachweisart->setTimeValid(6);
		$dateInterval = $nachweisart->getDateInterval();
		$this->assertEquals(6, $dateInterval->format('%m'));
		
		$nachweisart->setTimeValid(4);
		$dateInterval = $nachweisart->getDateInterval();
		$this->assertEquals(4, $dateInterval->format('%m'));
	}
}