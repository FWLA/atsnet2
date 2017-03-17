<?php
namespace Atemschutz\NachweisBundle\Test\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class G26RepositoryFunctionalTest extends WebTestCase {
	
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
	
	public function testGetAmountOfYear() {
		$amountOfYear = $this->em
			->getRepository("AtemschutzNachweisBundle:G26")
			->getAmountOfYear(3, 2010);
		
		$this->assertGreaterThan(0, $amountOfYear);
	}
	
	public function testFindAvailableYears() {
		$availableYears = $this->em
			->getRepository("AtemschutzNachweisBundle:G26")
			->findAvailableYears();
		
		$this->assertContains(2010, $availableYears);
	}
	
	/**
	 * {@inheritDoc}
	 */
	protected function tearDown() {
		parent::tearDown();
		$this->em->close();
	}

}