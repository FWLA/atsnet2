<?php
namespace Atemschutz\NachweisBundle\Statistik;

use Doctrine\Bundle\DoctrineBundle\Registry;

/**
 * @author Benjamin Ihrig
 */
class Statistik {
	
	private $doctrine;
	
	public function __construct(Registry $doctrine) {
		$this->doctrine = $doctrine;
	}
	
	/**
	 * @param integer $year
	 * @return Atemschutz\NachweisBundle\Statistik\Jahresstatistik
	 */
	public function getJahresstatistik($year) {
		$jahresstatistik = new Jahresstatistik();
		$jahresstatistik->setJahr($year);
		
		$jahresstatistik->setLehrgaengeAts1($this->doctrine
				->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
				->getAmountAts1OfYear($year)
		);
		$jahresstatistik->setLehrgaengeAts2($this->doctrine
				->getRepository('AtemschutzNachweisBundle:Atemschutzgeraetetraeger')
				->getAmountAts2OfYear($year)
		);
		
		$jahresstatistik->setG26_1($this->doctrine
				->getRepository('AtemschutzNachweisBundle:G26')
				->getAmountOfYear(1, $year)
		);
		$jahresstatistik->setG26_2($this->doctrine
				->getRepository('AtemschutzNachweisBundle:G26')
				->getAmountOfYear(2, $year)
		);
		$jahresstatistik->setG26_3($this->doctrine
				->getRepository('AtemschutzNachweisBundle:G26')
				->getAmountOfYear(3, $year)
		);
		
		$nachweisarten = $this->doctrine
		->getRepository('AtemschutzNachweisBundle:Nachweisart')
		->findAll();
		
		foreach ($nachweisarten as $nachweisart) {
			$jahresstatistik->addNachweis($nachweisart->getName(), $this
					->doctrine
					->getRepository('AtemschutzNachweisBundle:Nachweis')
					->getTotalAmountOfYearOfNachweisart($year, $nachweisart)
			);
		}
		
		$jahresstatistik->setMinutenAts($this->doctrine
				->getRepository('AtemschutzNachweisBundle:Nachweis')
				->getTotalMinutesOfYear($year)
		);
		
		return $jahresstatistik;
	}
}