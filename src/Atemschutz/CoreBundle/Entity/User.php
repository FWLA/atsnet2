<?php
namespace Atemschutz\CoreBundle\Entity;

use Atemschutz\CoreBundle\Security\Roles;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Atemschutz\CoreBundle\Entity\UserRepository")
 * @ORM\Table(name="user")
 * 
 * @author Benjamin Ihrig
 */
class User implements AdvancedUserInterface, \Serializable {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="string", length=100, unique=true)
	 */
	private $email;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $lastname;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $firstname;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Organisation", inversedBy="users")
	 * @ORM\JoinColumn(name="organisation_id", referencedColumnName="id")
	 */
	private $organisation;
	
	/**
	 * @ORM\Column(type="array")
	 */
	private $roles;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $salt;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $password;
	
	/**
	 * @ORM\Column(name="is_active", type="boolean")
	 */
	private $isActive;
	
	/**
	 * @ORM\OneToOne(targetEntity="Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger", mappedBy="user")
	 * @var unknown
	 */
	private $atemschutzgeraetetraeger;

	public function __construct() {
		$this->isActive = true;
		$this->salt = md5(uniqid(null, true));
	}

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set organisation
     *
     * @param Atemschutz\CoreBundle\Entity\Organisation $organisation
     * @return User
     */
    public function setOrganisation(Organisation $organisation = null)
    {
        $this->organisation = $organisation;
    
        return $this;
    }

    /**
     * Get organisation
     *
     * @return \Atemschutz\CoreBundle\Entity\Organisation 
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Set roles
     *
     * @param array $roles
     * @return User
     */
    public function setRoles($roles)
    {
    	if (!in_array('ROLE_USER', $roles)) {
    		array_push($roles, 'ROLE_USER');
    	}
    		
        $this->roles = $roles;
    
        return $this;
    }

    /**
     * Get roles
     *
     * @return array 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set atemschutzgeraetetraeger
     *
     * @param \Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger $atemschutzgeraetetraeger
     * @return User
     */
    public function setAtemschutzgeraetetraeger(\Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger $atemschutzgeraetetraeger = null)
    {
        $this->atemschutzgeraetetraeger = $atemschutzgeraetetraeger;
    
        return $this;
    }

    /**
     * Get atemschutzgeraetetraeger
     *
     * @return \Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger 
     */
    public function getAtemschutzgeraetetraeger()
    {
        return $this->atemschutzgeraetetraeger;
    }
    
    /**
     * Returns a String representation of the user
     * @return string
     */
    public function __toString() {
    	return $this->lastname.', '.$this->firstname;
    }
    
    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\Security\Core\User\UserInterface::eraseCredentials()
     */
    public function eraseCredentials() {
    	// do nthing
    }
    
    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\Security\Core\User\AdvancedUserInterface::isAccountNonExpired()
     */
    public function isAccountNonExpired() {
    	return true;
    }
    
    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\Security\Core\User\AdvancedUserInterface::isAccountNonLocked()
     */
    public function isAccountNonLocked() {
    	return true;
    }
    
    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\Security\Core\User\AdvancedUserInterface::isCredentialsNonExpired()
     */
    public function isCredentialsNonExpired() {
    	return true;
    }
    
    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\Security\Core\User\AdvancedUserInterface::isEnabled()
     */
    public function isEnabled() {
    	return $this->isActive;
    }
    
    /**
     * returns an array with the displayable names of the users roles
     * @return multitype:NULL
     */
    public function getNamedRoles() {
    	$namedRoles = array();
    	$roleSys = new Roles();
    	
    	foreach($this->getRoles() as $role) {
    		$namedRoles[] = $roleSys->getRolename($role);
    	}
    	
    	return $namedRoles;
    }
    
    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\Security\Core\User\UserInterface::getUsername()
     */
    public function getUsername() {
    	return $this->email;
    }
    
    /**
     * (non-PHPdoc)
     * @see Serializable::serialize()
     */
    public function serialize() {
    	return serialize(array(
    			$this->id,
    	));
    }
    
    /**
     * (non-PHPdoc)
     * @see Serializable::unserialize()
     */
    public function unserialize($serialized) {
    	list (
    		$this->id,
    	) = unserialize($serialized);
    }
    
    public function hasRole($role) {
    	if (in_array($role, $this->roles)) {
    		return true;
    	} else {
    		return false;
    	}
    }
    
    public function isAllowedToEdit(User $user) {
    	if ($this->getId() == $user->getId()) {
    		return true;
    	} else if ($this->hasRole(Roles::$CORE_SADMIN)) {
    		return true;
    	} else if ($this->hasRole(Roles::$CORE_ADMIN)) {
    		if ($user->hasRole(Roles::$CORE_SADMIN) || $user->hasRole(Roles::$CORE_ADMIN)) {
    			return false;
    		} else {
    			return true;
    		}
    	} else if ($this->hasRole(Roles::$CORE_MANAGER)) {
    		if ($user->hasRole(Roles::$CORE_SADMIN) || $user->hasRole(Roles::$CORE_ADMIN) || $user->hasRole(Roles::$CORE_MANAGER)) {
    			return false;
    		} else {
    			return true;
    		}
    	} else {
    		return false;
    	}
    }
    
    public function getAllocatableRoles() {
    	if (in_array('ROLE_CORE_SADMIN', $this->getRoles())) {
    		return array(
				Roles::$USER				=> 'Benutzer',
				Roles::$CORE_MANAGER		=> 'Systemmanager',
				Roles::$CORE_ADMIN			=> 'Systemadmin',
				Roles::$CORE_SADMIN			=> 'Superadmin',
				Roles::$NACHWEIS_VIEWER		=> 'Nachweis Sichter',
				Roles::$NACHWEIS_MANAGER	=> 'Nachweis Manager',
				Roles::$NACHWEIS_ADMIN		=> 'Nachweis Admin'
			);
    	} else if (in_array('ROLE_CORE_ADMIN', $this->getRoles())) {
    		return array(
				Roles::$USER				=> 'Benutzer',
				Roles::$CORE_MANAGER		=> 'Systemmanager',
				Roles::$NACHWEIS_VIEWER		=> 'Nachweis Sichter',
				Roles::$NACHWEIS_MANAGER	=> 'Nachweis Manager',
			);
    	} else {
    		return array(
				Roles::$USER				=> 'Benutzer',
    		);
    	}
    }
}