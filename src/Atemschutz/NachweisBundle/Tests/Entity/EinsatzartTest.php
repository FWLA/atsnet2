<?php
namespace Atemschutz\NachweisBundle\Test\Entity;

use Atemschutz\NachweisBundle\Entity\Einsatzart;

/**
 * @author Benjamin Ihrig
 */
class EinsatzartTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * tests setters and getters of einsatzart
	 */
	public function testSettersGetters() {
		$einsatzart = new Einsatzart();
		
		$name = 'Brandeinsatz';
		
		$einsatzart->setName($name);
		
		$this->assertNull($einsatzart->getId());
		$this->assertEquals($name, $einsatzart->getName());
	}
	
	/**
	 * tests the toString method of einsatzart
	 */
	public function testToString() {
		$einsatzart = new Einsatzart();
		
		$name = 'Brandeinsatz';
		
		$einsatzart->setName($name);
		
		$this->assertEquals($name, $einsatzart->__toString());
	}
}