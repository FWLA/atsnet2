<?php
namespace Atemschutz\NachweisBundle\Test\Statistik;

use Atemschutz\NachweisBundle\Statistik\Jahresstatistik;

use Atemschutz\NachweisBundle\Statistik\Statistik;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StatistikFunctionalTest extends WebTestCase {
	
	/**
	 * @var Statistik
	 */
	private $statistik;
	
	/**
	 * {@inheritDoc}
	 */
	public function setUp() {
		static::$kernel = static::createKernel();
		static::$kernel->boot();
		$this->statistik = static::$kernel->getContainer()
			->get('statistik');
	}
	
	public function testGetJahresstatistik() {
		$jahresstatistik = $this->statistik
			->getJahresstatistik(2011);
		
		$this->assertTrue($jahresstatistik instanceof Jahresstatistik);
		$this->assertEquals(2011, $jahresstatistik->getJahr());
	}
	
	/**
	 * {@inheritDoc}
	 */
	protected function tearDown() {
		parent::tearDown();
	}
}