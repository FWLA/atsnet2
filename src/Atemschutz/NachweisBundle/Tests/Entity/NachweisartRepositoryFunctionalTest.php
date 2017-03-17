<?php
namespace Atemschutz\NachweisBundle\Test\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NachweisartRepositoryFunctionalTest extends WebTestCase {
	
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
			->getRepository("AtemschutzNachweisBundle:Nachweisart")
			->findAll();
		
		$this->assertNotEquals(0, count($all));
	}
	
	public function testGetNachweisartsForAts1() {
		$nachweisarts = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweisart")
			->getNachweisartsForAts1();
		
		$this->assertNotEquals(0, count($nachweisarts));
		
		foreach ($nachweisarts as $nachweisart) {
			$this->assertEquals(1, $nachweisart->getRequiredFor());
		}
	}
	
	public function testGetNachweisartsForAts2() {
		$nachweisarts = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweisart")
			->getNachweisartsForAts2();
		
		$this->assertNotEquals(0, count($nachweisarts));
		
		foreach ($nachweisarts as $nachweisart) {
			$this->assertEquals(2, $nachweisart->getRequiredFor());
		}
	}
	
	/**
	 * {@inheritDoc}
	 */
	protected function tearDown() {
		parent::tearDown();
		$this->em->close();
	}

}