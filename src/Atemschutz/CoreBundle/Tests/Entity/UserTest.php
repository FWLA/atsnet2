<?php
namespace Atemschutz\CoreBundle\Tests\Entity;

use Atemschutz\CoreBundle\Security\Roles;

use Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger;

use Atemschutz\CoreBundle\Entity\Organisation;

use Atemschutz\CoreBundle\Entity\User;

/**
 * @author Benjamin Ihrig
 */
class UserTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * test setters and getters of user entity
	 */
	public function testSettersGetters() {
		$user = new User();
		
		// check defaults
		$this->assertNotNull($user->getSalt());
		$this->assertNotEquals('', $user->getSalt());
		$this->assertTrue($user->getIsActive());
		
		$firstname = 'Benjamin';
		$lastname = 'Ihrig';
		$password = 'password';
		$email = 'benjamin.ihrig@gmail.com';
		$roles = array('ROLE_SUPERADMIN');
		$isActive = false;
		$organisation = new Organisation();
		$organisation->setName('Feuerwehr Lampertheim-Mitte');
		$salt = "salt";
		
		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
		$atemschutzgeraetetraeger->setFirstname("Benjamin");
		$atemschutzgeraetetraeger->setLastname("Ihrig");
		
		$user->setFirstname($firstname);
		$user->setLastname($lastname);
		$user->setPassword($password);
		$user->setEmail($email);
		$user->setRoles($roles);
		$user->setIsActive($isActive);
		$user->setOrganisation($organisation);
		$user->setSalt($salt);
		$user->setAtemschutzgeraetetraeger($atemschutzgeraetetraeger);
		
		$this->assertNull($user->getId());
		$this->assertEquals($firstname, $user->getFirstname());
		$this->assertEquals($lastname, $user->getLastname());
		$this->assertEquals($password, $user->getPassword());
		$this->assertEquals($email, $user->getEmail());
		$this->assertEquals($roles, $user->getRoles());
		$this->assertEquals($isActive, $user->getIsActive());
		$this->assertEquals($isActive, $user->isEnabled());
		$this->assertEquals($organisation, $user->getOrganisation());
		$this->assertEquals($salt, $user->getSalt());
		$this->assertEquals($atemschutzgeraetetraeger, $user->getAtemschutzgeraetetraeger());
		$this->assertEquals($email, $user->getUsername());
	}
	
	/**
	 * test the toString method of user entity
	 */
	public function testToString() {
		$user = new User();
		
		$firstname = 'Benjamin';
		$lastname = 'Ihrig';
		$password = 'password';
		$email = 'benjamin.ihrig@gmail.com';
		$roles = array('ROLE_SUPERADMIN');
		$isActive = false;
		
		$user->setFirstname($firstname);
		$user->setLastname($lastname);
		$user->setPassword($password);
		$user->setEmail($email);
		$user->setRoles($roles);
		$user->setIsActive($isActive);
		
		$this->assertEquals('Ihrig, Benjamin', $user->__toString());
	}
	
	public function testIsAccountNonExpired() {
		$user = new User();
		
		$this->assertTrue($user->isAccountNonExpired());
	}
	
	public function testIsAccountNonLocked() {
		$user = new User();
		
		$this->assertTrue($user->isAccountNonLocked());
	}
	
	public function testIsCredentialsNonExpired() {
		$user = new User();
		
		$this->assertTrue($user->isCredentialsNonExpired());
	}
	
	public function testSerialize() {
		$user = new User();
		
		$this->assertNotNull($user->serialize());
	}
	
	public function testGetNamedRoles() {
		$user = new User();
		$user->setRoles(array(
				'ROLE_USER',
				'ROLE_CORE_MANAGER',
				'ROLE_CORE_ADMIN'
		));
		
		$this->assertEquals(3, count($user->getNamedRoles()));
		$this->assertContains('Benutzer', $user->getNamedRoles());
		$this->assertContains('Systemmanager', $user->getNamedRoles());
		$this->assertContains('Systemadmin', $user->getNamedRoles());
	}
}