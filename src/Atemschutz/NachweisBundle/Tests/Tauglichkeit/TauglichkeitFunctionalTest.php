<?php
namespace Atemschutz\NachweisBundle\Test\Tauglichkeit;

use Atemschutz\NachweisBundle\Tauglichkeit\TauglichkeitInfoFactory;

use Atemschutz\NachweisBundle\Tauglichkeit\Tauglichkeit;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TauglichkeitFunctionalTest extends WebTestCase {
	
	/**
	 * @var Tauglichkeit
	 */
	private $tauglichkeit;
	
	/**
	 * {@inheritDoc}
	 */
	public function setUp() {
		static::$kernel = static::createKernel();
		static::$kernel->boot();
		$this->tauglichkeit = static::$kernel->getContainer()
			->get('tauglichkeit');
	}
	
	public function testGetTauglichkeitInfoFactory() {
		$tauglichkeitInfoFactory = $this->tauglichkeit->getTauglichkeitInfoFactory();
		$this->assertTrue($tauglichkeitInfoFactory instanceof TauglichkeitInfoFactory);
	}
	
	public function testGetTauglichkeitReport() {
		$report = $this->tauglichkeit->getTauglichkeitReport();
		
		$this->assertEquals(3, count($report));
	}
	
	/**
	 * {@inheritDoc}
	 */
	protected function tearDown() {
		parent::tearDown();
	}
}