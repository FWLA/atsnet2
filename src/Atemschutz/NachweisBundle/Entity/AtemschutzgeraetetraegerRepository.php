<?php
namespace Atemschutz\NachweisBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * @author Benjamin Ihrig
 */
class AtemschutzgeraetetraegerRepository extends EntityRepository {
	
	/**
	 * (non-PHPdoc)
	 * @see \Doctrine\ORM\EntityRepository::findAll()
	 */
	public function findAll() {
		$query = $this->createQueryBuilder('a')
			->orderBy('a.firstname', 'ASC')
			->orderBy('a.lastname', 'ASC')
			->getQuery();
		
		return $query->getResult();
	}
	
	/**
	 * returns all active ATSGT ordered by last and first name
	 * @return Ambigous <multitype:, \Doctrine\ORM\mixed, \Doctrine\ORM\Internal\Hydration\mixed, \Doctrine\DBAL\Driver\Statement, \Doctrine\Common\Cache\mixed>
	 */
	public function findAllActiveOrderedByName() {
		$query = $this->createQueryBuilder('a')
			->where('a.isActive = :active')
			->orderBy('a.firstname', 'ASC')
			->orderBy('a.lastname', 'ASC')
			->setParameter('active', true)
			->getQuery();
		
		return $query->getResult();
	}
	
	/**
	 * returns count of ats1 in year
	 * @param integer $year
	 * @return integer
	 */
	public function getAmountAts1OfYear($year) {
		$query = $this->createQueryBuilder('u')
			->select('COUNT(u)')
			->where('u.ats1 >= :firstJan')
			->andWhere('u.ats1 <= :lastDec')
			->setParameter('firstJan', new \DateTime($year.'-01-01'))
			->setParameter('lastDec', new \DateTime($year.'-12-31'))
			->getQuery();
		
		return $query->getSingleScalarResult();
	}
	
	/**
	 * returns count of ats2 in year
	 * @param integer $year
	 * @return integer
	 */
	public function getAmountAts2OfYear($year) {
		$query = $this->createQueryBuilder('u')
			->select('COUNT(u)')
			->where('u.ats2 >= :firstJan')
			->andWhere('u.ats2 <= :lastDec')
			->setParameter('firstJan', new \DateTime($year.'-01-01'))
			->setParameter('lastDec', new \DateTime($year.'-12-31'))
			->getQuery();
		
		return $query->getSingleScalarResult();
	}
}