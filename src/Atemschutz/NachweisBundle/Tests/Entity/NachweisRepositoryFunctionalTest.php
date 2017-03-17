<?php
namespace Atemschutz\NachweisBundle\Test\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NachweisRepositoryFunctionalTest extends WebTestCase {
	
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
	
	public function testFindAtemschutzgeraetetraegersLatestByNachweisart() {
		$atemschutzgeraetetraeger = $this->em
			->getRepository("AtemschutzNachweisBundle:Atemschutzgeraetetraeger")
			->find(1);
		
		$nachweisart = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweisart")
			->find(1);
		
		$nachweis = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->findAtemschutzgeraetetraegersLatestByNachweisart($atemschutzgeraetetraeger, $nachweisart);
		
		$this->assertNotNull($nachweis);
		
		$nachweisart = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweisart")
			->find(9);
		
		$nachweis = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->findAtemschutzgeraetetraegersLatestByNachweisart($atemschutzgeraetetraeger, $nachweisart);
		
		$this->assertNull($nachweis);
	}
	
	public function testFindByNachweisart() {
		$nachweisart = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweisart")
			->find(1);
		
		$nachweise = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->findByNachweisArt($nachweisart);
		
		$this->assertGreaterThan(0, count($nachweise));
		
		foreach ($nachweise as $nachweis) {
			$this->assertEquals($nachweisart, $nachweis->getNachweisart());
		}
	}
	
	public function testFindNachweisEqualDateAndLocation() {
		$refNachweis = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->find(181);
		
		$nachweise = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->findNachweisEqualDateAndLocation($refNachweis);
		
		$this->assertGreaterThan(0, count($nachweise));
		
		foreach ($nachweise as $nachweis) {
			$this->assertEquals($refNachweis->getDate(), $nachweis->getDate());
			$this->assertEquals($refNachweis->getLocation(), $nachweis->getLocation());
		}
		
		
		// ohne Einsatznummer
		$refNachweis = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->find(175);
		
		$nachweise = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->findNachweisEqualDateAndLocation($refNachweis);
		
		$this->assertGreaterThan(0, count($nachweise));
		
		foreach ($nachweise as $nachweis) {
			$this->assertEquals($refNachweis->getDate(), $nachweis->getDate());
			$this->assertEquals($refNachweis->getLocation(), $nachweis->getLocation());
		}
	}
	
	/**
	 * tests getAvailableYears method
	 */
	public function testGetAvailableYears() {
		$years = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->findAvailableYears();
		
		$this->assertGreaterThan(0, count($years));
		$this->assertContains(2011, $years);
	}
	
	/**
	 * tests getTotalAmountOfYearOfNachweisart method
	 */
	public function testGetTotalAmountOfYearOfNachweisart() {
		$nachweisart = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweisart")
			->find(4);
		
		$amount = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->getTotalAmountOfYearOfNachweisart(2011, $nachweisart);
		
		$this->assertGreaterThan(0, $amount);
	}
	
	/**
	 * tests getTotalMinutesOfYear method
	 */
	public function testGetTotalMinutesOfYear() {
		$amount = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->getTotalMinutesOfYear(2011);
		
		$this->assertGreaterThan(0, $amount);
	}
	
	/**
	 * tests findNachweisByEinsatz method
	 */
	public function testFindNachweisByEinsatz() {
		$nachweis = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->findNachweisByEinsatz(2010, 66);
		
		$this->assertNotNull($nachweis);
	}
	
	/**
	 * tests findUsedLocationsGrouped method
	 */
	public function testFindUsedLocationsGrouped() {
		$locations = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->findUsedLocationsGrouped();
		
		$this->assertGreaterThan(0, count($locations));
	}
	
	/**
	 * tests findUsedWorkGrouped method
	 */
	public function testFindUsedWorkGrouped() {
		$work = $this->em
			->getRepository("AtemschutzNachweisBundle:Nachweis")
			->findUsedWorkGrouped();
		
		$this->assertGreaterThan(0, count($work));
	}
	
	/**
	 * {@inheritDoc}
	 */
	protected function tearDown() {
		parent::tearDown();
		$this->em->close();
	}

}