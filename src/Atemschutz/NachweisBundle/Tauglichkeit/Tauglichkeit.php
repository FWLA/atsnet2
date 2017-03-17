<?php
namespace Atemschutz\NachweisBundle\Tauglichkeit;

use Atemschutz\NachweisBundle\Entity\Nachweisart;

use Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger;

use Doctrine\Bundle\DoctrineBundle\Registry;

/**
 * @author Benjamin Ihrig
 */
class Tauglichkeit {
	
	private $doctrine;
	
	/**
	 * @param Registry $doctrine
	 */
	public function __construct(Registry $doctrine) {
		$this->doctrine = $doctrine;
	}
	
	/**
	 * returns factory for TauglichkeitInfo
	 * @return \Atemschutz\NachweisBundle\Tauglichkeit\TauglichkeitInfoFactory
	 */
	public function getTauglichkeitInfoFactory() {
		return new TauglichkeitInfoFactory($this->doctrine);
	}
	
	/**
	 * returns required Nachweisarts for ATS 1
	 */
	private function getRequiredForAts1() {
		return $this->doctrine
			->getRepository('AtemschutzNachweisBundle:Nachweisart')
			->getNachweisartsForAts1();
	}
	
	/**
	 * returns required Nachweisarts for ATS 2
	 */
	private function getRequiredForAts2() {
		return $this->doctrine
			->getRepository('AtemschutzNachweisBundle:Nachweisart')
			->getNachweisartsForAts2();
	}
	
	/**
	 * returns the Atemschutzgeräteträger's latest entry for a Nachweisart
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
	 * Creates a report for all Atemschutzgeräteträgers' Tauglichkeit
	 * @return multitype:multitype:unknown
	 */
	public function getTauglichkeitReport() {
		$tauglich0 = array();
		$tauglich1 = array();
		$tauglich2 = array();
		
		$atemschutzgeraetetraegers = $this->doctrine
			->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
			->findAllActiveOrderedByName();
		
		foreach ($atemschutzgeraetetraegers as $atemschutzgeraetetraeger) {
			if (!$atemschutzgeraetetraeger->isOver18()) {
				$tauglich0[] = $atemschutzgeraetetraeger;
			} else if ($atemschutzgeraetetraeger->getAts1() == null) {
				$tauglich0[] = $atemschutzgeraetetraeger;
			} else if (!$atemschutzgeraetetraeger->hasValidG26()) {
				$tauglich0[] = $atemschutzgeraetetraeger;
			} else {
				$untauglich = false;
				foreach ($this->getRequiredForAts1() as $nachweisart) {
					$nachweis = $this->getLatestForNachweisart($atemschutzgeraetetraeger, $nachweisart);
					if($nachweis == null || !$nachweis->isValid()) {
						$tauglich0[] = $atemschutzgeraetetraeger;
						$untauglich = true;
						break;
					}
				}
				if(!$untauglich) {
					$tauglich1[] = $atemschutzgeraetetraeger;
					
					if($atemschutzgeraetetraeger->getAts2() != null) {
						foreach ($this->getRequiredForAts2() as $nachweisart) {
							$nachweis = $this->getLatestForNachweisart($atemschutzgeraetetraeger, $nachweisart);
							if($nachweis == null || !$nachweis->isValid()) {
								$untauglich = true;
								break;
							}
						}
						if(!$untauglich) {
							$tauglich2[] = $atemschutzgeraetetraeger;
						}
					}
				}
			}
		}
		
		return array(
			0 => $tauglich0,
			1 => $tauglich1,
			2 => $tauglich2
		);
	}
}