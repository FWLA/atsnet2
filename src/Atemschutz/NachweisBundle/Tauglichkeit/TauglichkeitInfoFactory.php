<?php
namespace Atemschutz\NachweisBundle\Tauglichkeit;

use Atemschutz\NachweisBundle\Entity\Nachweisart;

use Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger;

use Atemschutz\NachweisBundle\Entity\Nachweis;

use Doctrine\ORM\EntityManager;

use Doctrine\Bundle\DoctrineBundle\Registry;

/**
 * @author Benjamin Ihrig
 */
class TauglichkeitInfoFactory {
	
	private $doctrine;
	
	/**
	 * @param Registry $doctrine
	 */
	public function __construct(Registry $doctrine) {
		$this->doctrine = $doctrine;
	}
	
	/**
	 * get required Nachweisarts for Ats1
	 */
	private function getRequiredForAts1() {
		return $this->doctrine
			->getRepository('AtemschutzNachweisBundle:Nachweisart')
			->getNachweisartsForAts1();
	}
	
	/**
	 * get required Nachweisarts for Ats2
	 */
	private function getRequiredForAts2() {
		return $this->doctrine
			->getRepository('AtemschutzNachweisBundle:Nachweisart')
			->getNachweisartsForAts2();
	}
	
	/**
	 * get latest entry for Nachweisart
	 * @param Atemschutzgeraetetraeger $atemschutzgeraetetraeger
	 * @param Nachweisart $nachweisart
	 * @return unknown
	 */
	private function getLatestForNachweisart(Atemschutzgeraetetraeger $atemschutzgeraetetraeger, Nachweisart $nachweisart) {
		$lastestNachweis = $this->doctrine
			->getRepository('AtemschutzNachweisBundle:Nachweis')
			->findAtemschutzgeraetetraegersLatestByNachweisart($atemschutzgeraetetraeger, $nachweisart);
			
		return $lastestNachweis;
	}
	
	/**
	 * creates TauglichkeitInfo for ATSGT
	 * @param Atemschutzgeraetetraeger $atemschutzgeraetetraeger
	 * @return \Atemschutz\NachweisBundle\Tauglichkeit\TauglichkeitInfo
	 */
	public function getTauglichkeitInfo(Atemschutzgeraetetraeger $atemschutzgeraetetraeger) {
		$info = new TauglichkeitInfo();
		
		$info->setOver18($atemschutzgeraetetraeger->isOver18());
		$info->setValidAts1($atemschutzgeraetetraeger->getAts1() != null);
		$info->setValidAts2($atemschutzgeraetetraeger->getAts2() != null);
		
		$requiredsAts1 = array();
		foreach ($this->getRequiredForAts1() as $nachweisart) {
			$nachweis = $this->getLatestForNachweisart($atemschutzgeraetetraeger, $nachweisart);
			$pair = new NachweisartNachweisPair($nachweisart, $nachweis);
			$requiredsAts1[] = $pair;
		}
		$info->setRequiredsForAts1($requiredsAts1);
		
		$requiredsAts2 = array();
		foreach ($this->getRequiredForAts2() as $nachweisart) {
			$nachweis = $this->getLatestForNachweisart($atemschutzgeraetetraeger, $nachweisart);
			$pair = new NachweisartNachweisPair($nachweisart, $nachweis);
			$requiredsAts2[] = $pair;
		}
		$info->setRequiredsForAts2($requiredsAts2);
		
		return $info;
	}
}