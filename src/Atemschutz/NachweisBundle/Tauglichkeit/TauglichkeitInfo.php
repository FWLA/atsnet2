<?php
namespace Atemschutz\NachweisBundle\Tauglichkeit;

use Atemschutz\NachweisBundle\Entity\Nachweis;

/**
 * @author Benjamin Ihrig
 */
class TauglichkeitInfo {
	
	private $over18;
	private $hasValidAts1;
	private $hasValidAts2;
	private $requiredsForAts1;
	private $requiredsForAts2;
	
	/**
	 * @param boolean $over18
	 */
	function setOver18($over18) {
		$this->over18 = $over18;
	}
	
	/**
	 * @return boolean
	 */
	public function isOver18() {
		return $this->over18;
	}
	
	/**
	 * @param boolean $validAts1
	 */
	function setValidAts1($validAts1) {
		$this->hasValidAts1 = $validAts1;
	}
	
	/**
	 * @return boolean
	 */
	public function hasValidAts1() {
		return $this->hasValidAts1;
	}
	
	/**
	 * @param boolean $validAts2
	 */
	function setValidAts2($validAts2) {
		$this->hasValidAts2 = $validAts2;
	}
	
	/**
	 * @return boolean
	 */
	public function hasValidAts2() {
		return $this->hasValidAts2;
	}
	
	/**
	 * @param array $requiredsForAts1
	 */
	function setRequiredsForAts1($requiredsForAts1) {
		$this->requiredsForAts1 = $requiredsForAts1;
	}
	
	/**
	 * @return array NachweisartNachweisPair
	 */
	public function getRequiredsForAts1() {
		return $this->requiredsForAts1;
	}
	
	/**
	 * @param array $requiredsForAts2
	 */
	public function setRequiredsForAts2($requiredsForAts2) {
		$this->requiredsForAts2 = $requiredsForAts2;
	}
	
	/**
	 * @return array NachweisartNachweisPair
	 */
	public function getRequiredsForAts2() {
		return $this->requiredsForAts2;
	}
}