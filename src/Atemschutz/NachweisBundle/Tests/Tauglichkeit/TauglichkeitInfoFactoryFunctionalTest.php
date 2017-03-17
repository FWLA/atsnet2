<?php
namespace Atemschutz\NachweisBundle\Test\Tauglichkeit;

use Atemschutz\NachweisBundle\Tauglichkeit\TauglichkeitInfo;

use Doctrine\ORM\EntityManager;

use Atemschutz\NachweisBundle\Tauglichkeit\TauglichkeitInfoFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TauglichkeitInfoFactoryFunctionalTest extends WebTestCase {
	
	/**
	 * @var TauglichkeitInfoFactory
	 */
	private $tauglichkeitInfoFactory;
	
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
			->get('doctrine')->getManager();
		$this->tauglichkeitInfoFactory = static::$kernel->getContainer()
			->get('tauglichkeit')->getTauglichkeitInfoFactory();
	}
	
	public function testGetTauglichkeitInfo() {
		$atemschutzgeraetetraeger = $this->em
			->getRepository("AtemschutzNachweisBundle:Atemschutzgeraetetraeger")
			->find(25);
		
		$tauglichkeitInfo = $this->tauglichkeitInfoFactory
			->getTauglichkeitInfo($atemschutzgeraetetraeger);
		
		$this->assertTrue($tauglichkeitInfo instanceof TauglichkeitInfo);
	}
	
	/**
	 * {@inheritDoc}
	 */
	protected function tearDown() {
		parent::tearDown();
		$this->em->close();
	}
}