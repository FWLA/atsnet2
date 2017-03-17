<?php
namespace Atemschutz\NachweisBundle\Statistik;

/**
 * @author Benjamin Ihrig
 */
class Jahresstatistik {
	
	private $jahr;
	
	private $lehrgaengeAts1;
	private $lehrgaengeAts2;
	
	private $g26_1;
	private $g26_2;
	private $g26_3;
	
	private $nachweise = array();
	
	private $minutenAts;
	
	/**
	 * @return integer
	 */
	public function getJahr() {
		return $this->jahr;
	}
	
	/**
	 * @param integer $jahr
	 */
	public function setJahr($jahr) {
		$this->jahr = $jahr;
	}
	
	/**
	 * @return integer
	 */
	public function getLehrgaengeAts1() {
		return $this->lehrgaengeAts1;
	}
	
	/**
	 * @param integer $lehrgaengeAts1
	 */
	public function setLehrgaengeAts1($lehrgaengeAts1) {
		$this->lehrgaengeAts1 = $lehrgaengeAts1;
	}
	
	/**
	 * @return integer
	 */
	public function getLehrgaengeAts2() {
		return $this->lehrgaengeAts2;
	}
	
	/**
	 * @param integer $lehrgaengeAts2
	 */
	public function setLehrgaengeAts2($lehrgaengeAts2) {
		$this->lehrgaengeAts2 = $lehrgaengeAts2;
	}
	
	/**
	 * @return integer
	 */
	public function getG26_1() {
		return $this->g26_1;
	}
	
	/**
	 * @param integer $g26_1
	 */
	public function setG26_1($g26_1) {
		$this->g26_1 = $g26_1;
	}
	
	/**
	 * @return integer
	 */
	public function getG26_2() {
		return $this->g26_2;
	}
	
	/**
	 * @param integer $g26_2
	 */
	public function setG26_2($g26_2) {
		$this->g26_2 = $g26_2;
	}
	
	/**
	 * @return integer
	 */
	public function getG26_3() {
		return $this->g26_3;
	}
	
	/**
	 * @param integer $g26_3
	 */
	public function setG26_3($g26_3) {
		$this->g26_3 = $g26_3;
	}
	
	/**
	 * @param string $name
	 * @param integer $anzahl
	 */
	public function addNachweis($name, $anzahl) {
		$this->nachweise[$name] = $anzahl;
	}
	
	/**
	 * @return array integer
	 */
	public function getNachweise() {
		return $this->nachweise;
	}
	
	/**
	 * @return integer
	 */
	public function getMinutenAts() {
		return $this->minutenAts;
	}
	
	/**
	 * @param integer $minutenAts
	 */
	public function setMinutenAts($minutenAts) {
		$this->minutenAts = $minutenAts;
	}
	
	/**
	 * @return float
	 */
	public function getStundenAts() {
		return str_replace(".", ",", round($this->minutenAts / 60, 1));
	}
}