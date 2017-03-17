<?php
namespace Atemschutz\NachweisBundle\Entity;

use Atemschutz\NachweisBundle\Entity\Nachweisart;
use Doctrine\ORM\EntityRepository;

/**
 * @author Benjamin Ihrig
 */
class NachweisRepository extends EntityRepository {
	
	/**
	 * finds the Atemschutzgeräteträger's latest Nachweis of Nachweisart
	 * @param Atemschutzgeraetetraeger $atemschutzgeraetetraeger
	 * @param Nachweisart $nachweisart
	 * @return Nachweis
	 */
	public function findAtemschutzgeraetetraegersLatestByNachweisart(Atemschutzgeraetetraeger $atemschutzgeraetetraeger, Nachweisart $nachweisart) {
		$query = $this->createQueryBuilder('n')
			->where('n.atemschutzgeraetetraeger = :atemschutzgeraetetraeger')
			->andWhere('n.nachweisart = :nachweisart')
			->orderBy('n.date', 'DESC')
			->setParameter('atemschutzgeraetetraeger', $atemschutzgeraetetraeger)
			->setParameter('nachweisart', $nachweisart)
			->getQuery();
		
		$results = $query->getResult();
		
		if(count($results) > 0)
			return $results[0];
		else
			return null;
	}
	
	/**
	 * returns all Nachweis by Nachweisart
	 * @param Nachweisart $nachweisart
	 * @return array Nachweis
	 */
	public function findByNachweisart(Nachweisart $nachweisart) {
		$query = $this->createQueryBuilder('n')
			->where('n.nachweisart = :nachweisart')
			->setParameter('nachweisart', $nachweisart)
			->getQuery();
			
		return $query->getResult();
	}
	
	/**
	 * find Atemschutzgeraetetraeger with equal nachweis
	 * @param Nachweis $nachweis
	 * @return array Atemschutzgeraetetraeger
	 */
	public function findNachweisEqualDateAndLocation(Nachweis $nachweis) {
		$query = $this->createQueryBuilder('n')
			->where('n.date = :date')
			->andWhere('n.location = :location');
		
		if($nachweis->getEinsatzNummer() == null) {
			$query = $query->andWhere('n.einsatzNummer is NULL');
		} else {
			$query = $query->andWhere('n.einsatzNummer = :einsatzNummer');
		}
		
		$query = $query->orderBy('n.atemschutzgeraetetraeger')
			->setParameter('date', $nachweis->getDate())
			->setParameter('location', $nachweis->getLocation());
		
		if($nachweis->getEinsatzNummer() != null) {
			$query = $query->setParameter('einsatzNummer', $nachweis->getEinsatzNummer());
		}
		
		$query = $query->getQuery();
		
		return $query->getResult();
	}
	
	/**
	 * returns array of available years
	 * @return array string
	 */
	public function findAvailableYears($order = 'ASC') {
		$query = $this->createQueryBuilder('n')
			->orderBy('n.date', $order)
			->getQuery();
		
		$nachweise = $query->getResult();
		
		$years = array();
		foreach ($nachweise as $nachweis) {
			$year = $nachweis->getDateFormatted('Y');
			
			if(!in_array($year, $years)) {
				$years[] = $year;
			}
		}
		return $years;
	}
	
	/**
	 * returns the total amount of entries in year
	 * @param integer $year
	 * @param Atemschutz\NachweisBundle\Entity\Nachweisart $nachweisart
	 * @return integer
	 */
	public function getTotalAmountOfYearOfNachweisart($year, Nachweisart $nachweisart) {
		$query = $this->createQueryBuilder('n')
			->select('COUNT(n)')
			->where('n.nachweisart = :nachweisart')
			->andWhere('n.date >= :firstJan')
			->andWhere('n.date <= :lastDec')
			->setParameter('nachweisart', $nachweisart)
			->setParameter('firstJan', new \DateTime($year.'-01-01'))
			->setParameter('lastDec', new \DateTime($year.'-12-31'))
			->getQuery();
		
		return $query->getSingleScalarResult();
	}
	
	/**
	 * calculates the total minutes of the year
	 * @param integer $year
	 * @return integer
	 */
	public function getTotalMinutesOfYear($year) {
		$query = $this->createQueryBuilder('n')
			->select('SUM(n.time)')
			->where('n.date >= :firstJan')
			->andWhere('n.date <= :lastDec')
			->setParameter('firstJan', new \DateTime($year.'-01-01'))
			->setParameter('lastDec', new \DateTime($year.'-12-31'))
			->getQuery();
		
		return $query->getSingleScalarResult();
	}
	
	/**
	 * finds a nachweis by year and einsatzNummer
	 * @param integer $year
	 * @param integer $einsatzNummer
	 */
	public function findNachweisByEinsatz($year, $einsatzNummer) {
		$query = $this->createQueryBuilder('n')
			->where('n.einsatzNummer = :einsatzNummer')
			->andWhere('n.date >= :firstJan')
			->andWhere('n.date <= :lastDec')
			->setParameter('einsatzNummer', $einsatzNummer)
			->setParameter('firstJan', new \DateTime($year.'-01-01'))
			->setParameter('lastDec', new \DateTime($year.'-12-31'))
			->getQuery();
		
		return $query->getResult();
	}
	
	public function findUsedLocationsGrouped() {
		$query = $this->createQueryBuilder('n')
			->select('n.location')
			->where('n.location IS NOT NULL')
			->groupBy('n.location')
			->orderBy('n.location', 'ASC')
			->getQuery();
		
		return $query->getArrayResult();
	}
	
	public function findUsedWorkGrouped() {
		$query = $this->createQueryBuilder('n')
			->select('n.work')
			->where('n.work IS NOT NULL')
			->groupBy('n.work')
			->orderBy('n.work', 'ASC')
			->getQuery();
		
		return $query->getArrayResult();
	}
}