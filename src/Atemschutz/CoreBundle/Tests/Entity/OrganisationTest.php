<?php
namespace Atemschutz\CoreBundle\Tests\Entity;

use Atemschutz\CoreBundle\Entity\User;

use Atemschutz\CoreBundle\Entity\Organisation;

/**
 * @author Benjamin Ihrig
 */
class OrganisationTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * Test the setters and getters of organisation entity
	 */
	public function testSettersGetters() {
		$organisation = new Organisation();
		
		$name = 'Feuerwehr Lampertheim-Mitte';
		$address1 = 'Florianstraße 4';
		$address2 = 'Any second line.';
		$plz = '68623';
		$ort = 'Lampertheim';
		$telefon = '06206 94270';
		
		$organisation->setName($name);
		$organisation->setAddress1($address1);
		$organisation->setAddress2($address2);
		$organisation->setPlz($plz);
		$organisation->setOrt($ort);
		$organisation->setTelefon($telefon);
		
		$this->assertNull($organisation->getId());
		$this->assertEquals($name, $organisation->getName());
		$this->assertEquals($address1, $organisation->getAddress1());
		$this->assertEquals($address2, $organisation->getAddress2());
		$this->assertEquals($plz, $organisation->getPlz());
		$this->assertEquals($ort, $organisation->getOrt());
		$this->assertEquals($telefon, $organisation->getTelefon());
	}
	
	/**
	 * test the users function of the organisation entity
	 */
	public function testUsers() {
		$organisation = new Organisation();
		
		$user = new User();
		$user->setFirstname('Benjamin');
		$user->setLastname('Ihrig');

		$this->assertNotContains($user, $organisation->getUsers());
		$organisation->addUser($user);
		$this->assertContains($user, $organisation->getUsers());
		$organisation->removeUser($user);
		$this->assertNotContains($user, $organisation->getUsers());
	}
	
	/**
	 * test the toString method of organisation entity
	 */
	public function testToString() {
		$organisation = new Organisation();
		
		$name = 'Feuerwehr Lampertheim-Mitte';
		$address1 = 'Florianstraße 4';
		$address2 = 'Any second line.';
		$plz = '68623';
		$ort = 'Lampertheim';
		$telefon = '06206 94270';
		
		$organisation->setName($name);
		$organisation->setAddress1($address1);
		$organisation->setAddress2($address2);
		$organisation->setPlz($plz);
		$organisation->setOrt($ort);
		$organisation->setTelefon($telefon);
		
		$this->assertEquals($name, $organisation->__toString());
	}
}