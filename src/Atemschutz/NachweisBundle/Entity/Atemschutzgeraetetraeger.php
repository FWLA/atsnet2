<?php
namespace Atemschutz\NachweisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Atemschutz\CoreBundle\Entity\User;

/**
 * @ORM\Entity(repositoryClass="Atemschutz\NachweisBundle\Entity\AtemschutzgeraetetraegerRepository")
 * @ORM\Table(name="atemschutzgeraetetraeger")
 * 
 * @author Benjamin Ihrig
 */
class Atemschutzgeraetetraeger {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $firstname;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $lastname;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Atemschutz\CoreBundle\Entity\Organisation")
	 * @ORM\JoinColumn(name="organisation_id", referencedColumnName="id", nullable=false)
	 */
	private $organisation;
	
	/**
	 * @ORM\OneToOne(targetEntity="Atemschutz\CoreBundle\Entity\User", inversedBy="atemschutzgeraetetraeger")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $user;
	
	/**
	 * @ORM\Column(type="date")
	 */
	private $birthdate;
	
	/**
	 * @ORM\Column(type="date", nullable=true)
	 */
	private $ats1 = null;
	
	/**
	 * @ORM\Column(type="date", nullable=true)
	 */
	private $ats2 = null;
	
	/**
	 * @ORM\OneToMany(targetEntity="G26", mappedBy="atemschutzgeraetetraeger")
	 * @ORM\OrderBy({"duedate" = "DESC"})
	 */
	private $g26s;
	
	/**
	 * @ORM\OneToMany(targetEntity="Nachweis", mappedBy="atemschutzgeraetetraeger")
	 * @ORM\OrderBy({"date" = "DESC"})
	 */
	private $nachweise;
	
	/**
	 * @ORM\Column(type="boolean")
	 */
	private $isActive = true;
	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->g26s = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nachweise = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstname
     *
     * @param string $firstname
     * @return Atemschutzgeraetetraeger
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
     * @return Atemschutzgeraetetraeger
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
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Atemschutzgeraetetraeger
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    
        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set ats1
     *
     * @param \DateTime $ats1
     * @return Atemschutzgeraetetraeger
     */
    public function setAts1($ats1)
    {
        $this->ats1 = $ats1;
    
        return $this;
    }

    /**
     * Get ats1
     *
     * @return \DateTime 
     */
    public function getAts1()
    {
        return $this->ats1;
    }

    /**
     * Set ats2
     *
     * @param \DateTime $ats2
     * @return Atemschutzgeraetetraeger
     */
    public function setAts2($ats2)
    {
        $this->ats2 = $ats2;
    
        return $this;
    }

    /**
     * Get ats2
     *
     * @return \DateTime 
     */
    public function getAts2()
    {
        return $this->ats2;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Atemschutzgeraetetraeger
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
     * @param \Atemschutz\CoreBundle\Entity\Organisation $organisation
     * @return Atemschutzgeraetetraeger
     */
    public function setOrganisation(\Atemschutz\CoreBundle\Entity\Organisation $organisation = null)
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
     * Set user
     *
     * @param \Atemschutz\CoreBundle\Entity\User $user
     * @return Atemschutzgeraetetraeger
     */
    public function setUser(\Atemschutz\CoreBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Atemschutz\CoreBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add g26s
     *
     * @param \Atemschutz\NachweisBundle\Entity\G26 $g26s
     * @return Atemschutzgeraetetraeger
     */
    public function addG26(\Atemschutz\NachweisBundle\Entity\G26 $g26s)
    {
        $this->g26s[] = $g26s;
    
        return $this;
    }

    /**
     * Remove g26s
     *
     * @param \Atemschutz\NachweisBundle\Entity\G26 $g26s
     */
    public function removeG26(\Atemschutz\NachweisBundle\Entity\G26 $g26s)
    {
        $this->g26s->removeElement($g26s);
    }

    /**
     * Get g26s
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getG26s()
    {
        return $this->g26s;
    }

    /**
     * Add nachweise
     *
     * @param \Atemschutz\NachweisBundle\Entity\Nachweis $nachweise
     * @return Atemschutzgeraetetraeger
     */
    public function addNachweise(\Atemschutz\NachweisBundle\Entity\Nachweis $nachweise)
    {
        $this->nachweise[] = $nachweise;
    
        return $this;
    }

    /**
     * Remove nachweise
     *
     * @param \Atemschutz\NachweisBundle\Entity\Nachweis $nachweise
     */
    public function removeNachweise(\Atemschutz\NachweisBundle\Entity\Nachweis $nachweise)
    {
        $this->nachweise->removeElement($nachweise);
    }

    /**
     * Get nachweise
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNachweise()
    {
        return $this->nachweise;
    }
    
    /**
     * @return string
     */
    public function __toString() {
    	return $this->lastname.', '.$this->firstname;
    }
    
    /**
     * returns a formatted string of the Ats1 date
     * @param string $format
     * @return NULL
     */
    public function getAts1Formatted($format = 'd.m.Y') {
    	if($this->ats1 == null) {
    		return null;
    	}
    	return $this->ats1->format($format);
    }
    
    /**
     * returns a formatted string of the Ats2 date
     * @param string $format
     * @return NULL
     */
    public function getAts2Formatted($format = 'd.m.Y') {
    	if($this->ats2 == null) {
    		return null;
    	}
    	return $this->ats2->format($format);
    }
    
    /**
     * returns a formatted string of the birthdate
     * @param string $format
     * @return NULL
     */
    public function getBirthdateFormatted($format = 'd.m.Y') {
    	if($this->birthdate == null) {
    		return null;
    	}
    	return $this->birthdate->format($format);
    }
    
    /**
     * checks if the ATSGT has a valid G26, classification 3
     * @return boolean
     */
    public function hasValidG26() {
    	if(count($this->g26s) == 0) {
    		return false;
    	}
    	
    	foreach ($this->g26s as $g26) {
    		if(!$g26->isInvalid() && $g26->getClassification() == 3) {
    			return true;
    		}
    	}
    	
    	return false;
    }
    
    public function getLatestValidG26() {
    	if(!$this->hasValidG26()) {
    		return null;
    	}
    	
    	$latestValid = null;
    	
    	foreach ($this->g26s as $g26) {
    		if(!$g26->isInvalid()) {
    			if($latestValid == null) {
    				$latestValid = $g26;
    			} else if ($g26->getDate()->getTimestamp() > $latestValid->getDate()->getTimestamp()) {
    				$latestValid = $g26;
    			}
    		}
    	}
    	
    	return $latestValid;
    }
    
    /**
     * tests if the ATSGT is older than 18 years old
     * @return boolean
     */
    public function isOver18() {
    	$currentDate = new \DateTime();
    	$birthdateClone = clone $this->birthdate;
    	$birthdateClone->add(new \DateInterval('P18Y'));
    	
    	return $currentDate >= $birthdateClone;
    }
    
    public function getLatestNachweisByNachweisart(Nachweisart $nachweisart) {
    	
    	$latestNachweis = null;
    	
    	foreach ($this->nachweise as $nachweis) {
    		if($nachweis->getNachweisart() === $nachweisart) {
    			if ($latestNachweis == null) {
    				$latestNachweis = $nachweis;
    			} else if ($nachweis->getDate()->getTimestamp() > $latestNachweis->getDate()->getTimestamp()) {
    				$latestNachweis = $nachweis;
    			}
    		}
    	}
    	
    	return $latestNachweis;
    }
}