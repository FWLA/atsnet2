<?php
namespace Atemschutz\NachweisBundle\Test\Tauglichkeit;

use Atemschutz\NachweisBundle\Entity\Nachweis;

use Atemschutz\NachweisBundle\Entity\Nachweisart;

use Atemschutz\NachweisBundle\Tauglichkeit\NachweisartNachweisPair;

/**
 * @author Benjamin
 */
class NachweisartNachweisPairTest extends \PHPUnit_Framework_TestCase {
	
	public function testConstructor() {
		$nachweisart = new Nachweisart();
		$nachweisart->setName("Einsatz");
		
		$nachweis = new Nachweis();
		$nachweis->setDate(new \DateTime());
		$nachweis->setNachweisart($nachweisart);
		$nachweis->setLocation("Lampertheim");
		
		$nachweisartNachweisPair = new NachweisartNachweisPair($nachweisart, $nachweis);
		
		$this->assertEquals($nachweisart, $nachweisartNachweisPair->getNachweisart());
		$this->assertEquals($nachweis, $nachweisartNachweisPair->getNachweis());
	}
	
}