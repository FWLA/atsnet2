<?php
namespace Atemschutz\NachweisBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * @author Benjamin Ihrig
 */
class NachweisartRepository extends EntityRepository {
	
	public function findAll() {
		$query = $this->createQueryBuilder('n')
			->orderBy('n.name', 'ASC')
			->getQuery();
		
		return $query->getResult();
	}
	
	/**
	 * returns required nachweisarts for ats1
	 * @return Nachweis
	 */
	public function getNachweisartsForAts1() {
		return $this->getNachweisartsForAts(1);
	}
	
	/**
	 * returns required nachweisarts for ats2
	 * @return Nachweis
	 */
	public function getNachweisartsForAts2() {
		return $this->getNachweisartsForAts(2);
	}
	
	/**
	 * returns nachweisart for ats given in parameter
	 * @param integer $ats
	 * @return Nachweis
	 */
	private function getNachweisartsForAts($ats) {
		$query = $this->createQueryBuilder('n')
			->where('n.requiredFor = :requiredFor')
			->setParameter('requiredFor', $ats)
			->orderBy('n.name', 'ASC')
			->getQuery();
			
		return $query->getResult();
	}
}