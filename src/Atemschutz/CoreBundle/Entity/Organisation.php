<?php
namespace Atemschutz\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="organisation")
 * 
 * @author Benjamin Ihrig
 */
class Organisation {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $name;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $address1;

	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	private $address2 = null;

	/**
	 * @ORM\Column(type="string", length=5)
	 */
	private $plz;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $ort;

	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	private $telefon = null;
	
	/**
	 * @ORM\OneToMany(targetEntity="User", mappedBy="organisation")
	 */
	private $users;
	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Standort
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address1
     *
     * @param string $address1
     * @return Standort
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    
        return $this;
    }

    /**
     * Get address1
     *
     * @return string 
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return Standort
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    
        return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set plz
     *
     * @param string $plz
     * @return Standort
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;
    
        return $this;
    }

    /**
     * Get plz
     *
     * @return string 
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Set ort
     *
     * @param string $ort
     * @return Standort
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;
    
        return $this;
    }

    /**
     * Get ort
     *
     * @return string 
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     * @return Standort
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    
        return $this;
    }

    /**
     * Get telefon
     *
     * @return string 
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Add users
     *
     * @param \Atemschutz\CoreBundle\Entity\User $users
     * @return Standort
     */
    public function addUser(\Atemschutz\CoreBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Atemschutz\CoreBundle\Entity\User $users
     */
    public function removeUser(\Atemschutz\CoreBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
    
    /**
     * Returns a String representation of the Organisation.
     */
    public function __toString() {
    	return $this->name;
    }
}