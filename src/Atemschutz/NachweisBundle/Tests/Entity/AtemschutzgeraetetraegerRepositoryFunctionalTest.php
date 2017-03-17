<?php
namespace Atemschutz\NachweisBundle\Test\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AtemschutzgeraetetraegerRepositoryFunctionalTest extends WebTestCase {
	
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
	
	public function testFindAll() {
		$all = $this->em
			->getRepository("AtemschutzNachweisBundle:Atemschutzgeraetetraeger")
			->findAll();
		
		$this->assertNotEquals(0, count($all));
	}
	
	public function testFindAllActiveOrderedByName() {
		$allActive = $this->em
			->getRepository("AtemschutzNachweisBundle:Atemschutzgeraetetraeger")
			->findAllActiveOrderedByName();
		
		$this->assertNotEquals(0, count($allActive));
		
		foreach ($allActive as $active) {
			$this->assertTrue($active->getIsActive());
		}
	}
	
	public function testGetAmountAts1OfYear() {
		$amount = $this->em
			->getRepository("AtemschutzNachweisBundle:Atemschutzgeraetetraeger")
			->getAmountAts1OfYear(2010);
		
		$this->assertGreaterThan(0, $amount);
	}
	
	public function testGetAmountAts2OfYear() {
		$amount = $this->em
			->getRepository("AtemschutzNachweisBundle:Atemschutzgeraetetraeger")
			->getAmountAts2OfYear(2010);
		
		$this->assertGreaterThan(0, $amount);
	}
	
	/**
	 * {@inheritDoc}
	 */
	protected function tearDown() {
		parent::tearDown();
		$this->em->close();
	}

}