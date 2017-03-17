<?php
namespace Atemschutz\NachweisBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * @author Benjamin Ihrig
 */
class G26Repository extends EntityRepository {


	/**
	 * returns array of available years
	 * @return array string
	 */
	public function findAvailableYears($order = 'ASC') {
		$query = $this->createQueryBuilder('g')
			->orderBy('g.date', $order)
			->getQuery();
	
		$g26s = $query->getResult();
	
		$years = array();
		foreach ($g26s as $g26) {
			$year = $g26->getDateFormatted('Y');
				
			if(!in_array($year, $years)) {
				$years[] = $year;
			}
		}
		return $years;
	}
	
	/**
	 * counts number of g26 with class in a year
	 * @param integer $class
	 * @param integer $year
	 * @return integer
	 */
	public function getAmountOfYear($class, $year) {
		$query = $this->createQueryBuilder('g')
			->select('count(g)')
			->where('g.classification = :class')
			->andWhere('g.date >= :firstJan')
			->andWhere('g.date <= :lastDec')
			->getQuery();
		
		$query->setParameter('class', $class);
		$query->setParameter('firstJan', new \DateTime($year.'-01-01'));
		$query->setParameter('lastDec', new \DateTime($year.'-12-31'));
		
		return $query->getSingleScalarResult();
	}
}