<?php
namespace Atemschutz\CoreBundle\Entity;

use Doctrine\ORM\NoResultException;

use Symfony\Component\Security\Core\User\UserProviderInterface;

use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

use Doctrine\ORM\EntityRepository;

/**
 * @author Benjamin Ihrig
 */
class UserRepository extends EntityRepository implements UserProviderInterface {
	
	/**
	 * finds all active users in the database
	 * @return Ambigous <multitype:, \Doctrine\ORM\mixed, \Doctrine\ORM\Internal\Hydration\mixed, \Doctrine\DBAL\Driver\Statement, \Doctrine\Common\Cache\mixed>
	 */
	public function findAllActive() {
		$query = $this->createQueryBuilder('a')
			->where('a.isActive = :isActive')
			->setParameter('isActive', true)
			->getQuery();
			
		return $query->getResult();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Security\Core\User\UserProviderInterface::loadUserByUsername()
	 */
	public function loadUserByUsername($email) {
		$q = $this
			->createQueryBuilder('u')
			->where('u.email = :email')
			->setParameter('email', $email)
			->getQuery();
		
		try {
			$user = $q->getSingleResult();
		} catch (NoResultException $nre) {
			throw new UsernameNotFoundException(sprintf('Kann keinen Benutzer mit dem Benutzernamen %s finden.', $email), 0, $nre);
		}
		
		return $user;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Security\Core\User\UserProviderInterface::refreshUser()
	 */
	public function refreshUser(UserInterface $user) {
		$class = get_class($user);
		
		if (!$this->supportsClass($class)) {
			throw new UnsupportedUserException(sprintf('Instanzen der Klasse "%s" sind nicht unterstützt.', $class));
		}
	
		return $this->find($user->getId());
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Security\Core\User\UserProviderInterface::supportsClass()
	 */
	public function supportsClass($class) {
		return $this->getEntityName() === $class || is_subclass_of($class, $this->getEntityName());
	}
}