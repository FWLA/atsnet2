<?php
namespace Atemschutz\NachweisBundle\Tauglichkeit;

use Atemschutz\NachweisBundle\Entity\Nachweis;

use Atemschutz\NachweisBundle\Entity\Nachweisart;

/**
 * @author Benjamin Ihrig
 */
class NachweisartNachweisPair {
	
	private $nachweisart;
	private $nachweis;
	
	/**
	 * @param Nachweisart $nachweisart
	 * @param Nachweis $nachweis
	 */
	function __construct(Nachweisart $nachweisart, Nachweis $nachweis = null) {
		$this->nachweisart = $nachweisart;
		$this->nachweis = $nachweis;
	}
	
	/**
	 * @return Nachweisart
	 */
	public function getNachweisart() {
		return $this->nachweisart;
	}
	
	/**
	 * @return Nachweis
	 */
	public function getNachweis() {
		return $this->nachweis;
	}
}