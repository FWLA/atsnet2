<?php
namespace Atemschutz\CoreBundle\Tests\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserRepositoryFunctionalRepositoryTest extends WebTestCase {
	
	/**
	 * @var EntityManager
	 */
	private $em;
	
	/**
	 * {@inheritDoc}
	 */
	public function setUp() {
		static::$kernel = static::createKernel();
		static::$kernel->boot();
		$this->em = static::$kernel->getContainer()
			->get('doctrine')
			->getManager();
	}
	
	public function testFindAllActive() {
		$activeUsers = $this->em
			->getRepository('AtemschutzCoreBundle:User')
			->findAllActive();
		
		$this->assertGreaterThan(0, count($activeUsers));
		
		foreach ($activeUsers as $user) {
			$this->assertTrue($user->getIsActive());
		}
	}
	
	public function testLoadUserByUsername() {
		$user = $this->em
			->getRepository('AtemschutzCoreBundle:User')
			->loadUserByUsername('benjamin.ihrig@gmail.com');
		
		$this->assertNotNull($user);
	}
	
	public function testLoadUserByUsernameNotFound() {
		$this->setExpectedException('Symfony\Component\Security\Core\Exception\UsernameNotFoundException');
		
		$user = $this->em
			->getRepository('AtemschutzCoreBundle:User')
			->loadUserByUsername('asdghadnfadhfjaejq');
	}
	
	public function testRefreshUser() {
		$user = $this->em
			->getRepository('AtemschutzCoreBundle:User')
			->loadUserByUsername('benjamin.ihrig@gmail.com');
		
		$refreshedUser = $this->em
			->getRepository('AtemschutzCoreBundle:User')
			->refreshUser($user);
		
		$this->assertEquals($user, $refreshedUser);
	}
	
	/**
	 * {@inheritDoc}
	 */
	protected function tearDown() {
		parent::tearDown();
		$this->em->close();
	}
}