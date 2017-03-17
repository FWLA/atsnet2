<?php
namespace Atemschutz\CoreBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;

use Atemschutz\CoreBundle\Entity\Organisation;

use Atemschutz\CoreBundle\Entity\User;

use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\FixtureInterface;

/**
 * @author Benjamin Ihrig
 */
class LoadUserData implements FixtureInterface, ContainerAwareInterface {
	
	private $container;
	
	/**
	 * Provides initial Organisation and User Data to the Database
	 */
	public function load(ObjectManager $manager) {
		
		$organisation = new Organisation();
		$organisation->setName('Feuerwehr Lampertheim-Mitte');
		$organisation->setAddress1('Florianstraße 4');
		$organisation->setOrt('Lampertheim');
		$organisation->setPlz('68623');
		$organisation->setTelefon('06206 94270');
		
		$manager->persist($organisation);
		$manager->flush();
		
		$sadmin = new User();
		$sadmin->setFirstname('Benjamin');
		$sadmin->setLastname('Ihrig');
		$sadmin->setEmail('benjamin.ihrig@gmail.com');
		$sadmin->setPassword('initialPassword');
		$sadmin->setOrganisation($organisation);
		$sadmin->setRoles(array(
			'ROLE_USER',
			'ROLE_CORE_MANAGER',
			'ROLE_CORE_ADMIN',
			'ROLE_CORE_SADMIN',
			'ROLE_NACHWEIS_VIEWER',
			'ROLE_NACHWEIS_MANAGER',
			'ROLE_NACHWEIS_ADMIN',
			'ROLE_LUFTMESSUNG_MANAGER',
			'ROLE_LUFTMESSUNG_ADMIN'
			)
		);
		
		$factory = $this->container->get('security.encoder_factory');
		 
		$encoder = $factory->getEncoder($sadmin);
		$password = $encoder->encodePassword($sadmin->getPassword(), $sadmin->getSalt());
		$sadmin->setPassword($password);
		
		$manager->persist($sadmin);
		$manager->flush();
	}
	
	public function setContainer(ContainerInterface $container = null) {
		$this->container = $container;
	}

}