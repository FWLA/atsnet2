<?php
namespace Atemschutz\NachweisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Atemschutz\NachweisBundle\Entity\NachweisRepository")
 * @ORM\Table(name="nachweis")
 * 
 * @author Benjamin Ihrig
 */
class Nachweis {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $einsatzNummer = null;
	
	/**
	 * @ORM\Column(type="date")
	 */
	private $date;
	
	/**
	 * @ORM\Column(type="string")
	 */
	private $location;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $time;
	
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	private $work = null;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Nachweisart")
	 * @ORM\JoinColumn(name="nachweisart_id", referencedColumnName="id", nullable=false)
	 */
	private $nachweisart;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Einsatzart")
	 * @ORM\JoinColumn(name="einsatzart_id", referencedColumnName="id", nullable=false)
	 */
	private $einsatzart;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Atemschutzgeraetetraeger", inversedBy="nachweise")
	 * @ORM\JoinColumn(name="atemschutzgeraetetraeger_id", referencedColumnName="id", nullable=false, onDelete="cascade")
	 */
	private $atemschutzgeraetetraeger;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Atemschutz\CoreBundle\Entity\User")
	 * @ORM\JoinColumn(name="atemschutzgeraetewart_id", referencedColumnName="id", nullable=false)
	 */
	private $atemschutzgeraetewart;
	
	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	private $notice;

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
     * Set einsatzNummer
     *
     * @param integer $einsatzNummer
     * @return Nachweis
     */
    public function setEinsatzNummer($einsatzNummer)
    {
        $this->einsatzNummer = $einsatzNummer;
    
        return $this;
    }

    /**
     * Get einsatzNummer
     *
     * @return integer 
     */
    public function getEinsatzNummer()
    {
        return $this->einsatzNummer;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Nachweis
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Nachweis
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set time
     *
     * @param integer $time
     * @return Nachweis
     */
    public function setTime($time)
    {
        $this->time = $time;
    
        return $this;
    }

    /**
     * Get time
     *
     * @return integer 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set work
     *
     * @param string $work
     * @return Nachweis
     */
    public function setWork($work)
    {
        $this->work = $work;
    
        return $this;
    }

    /**
     * Get work
     *
     * @return string 
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * Set atemschutzgeraetetraeger
     *
     * @param \Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger $atemschutzgeraetetraeger
     * @return Nachweis
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
     * Set atemschutzgeraetewart
     *
     * @param \Atemschutz\CoreBundle\Entity\User $atemschutzgeraetewart
     * @return Nachweis
     */
    public function setAtemschutzgeraetewart(\Atemschutz\CoreBundle\Entity\User $atemschutzgeraetewart = null)
    {
        $this->atemschutzgeraetewart = $atemschutzgeraetewart;
    
        return $this;
    }

    /**
     * Get atemschutzgeraetewart
     *
     * @return \Atemschutz\CoreBundle\Entity\User 
     */
    public function getAtemschutzgeraetewart()
    {
        return $this->atemschutzgeraetewart;
    }

    /**
     * Set nachweisart
     *
     * @param \Atemschutz\NachweisBundle\Entity\Nachweisart $nachweisart
     * @return Nachweis
     */
    public function setNachweisart(\Atemschutz\NachweisBundle\Entity\Nachweisart $nachweisart = null)
    {
        $this->nachweisart = $nachweisart;
    
        return $this;
    }

    /**
     * Get nachweisart
     *
     * @return \Atemschutz\NachweisBundle\Entity\Nachweisart 
     */
    public function getNachweisart()
    {
        return $this->nachweisart;
    }

    /**
     * Set einsatzart
     *
     * @param \Atemschutz\NachweisBundle\Entity\Einsatzart $einsatzart
     * @return Nachweis
     */
    public function setEinsatzart(\Atemschutz\NachweisBundle\Entity\Einsatzart $einsatzart)
    {
        $this->einsatzart = $einsatzart;
    
        return $this;
    }

    /**
     * Get einsatzart
     *
     * @return \Atemschutz\NachweisBundle\Entity\Einsatzart 
     */
    public function getEinsatzart()
    {
        return $this->einsatzart;
    }

    /**
     * Set notice
     *
     * @param string $notice
     * @return Nachweis
     */
    public function setNotice($notice)
    {
        $this->notice = $notice;
    
        return $this;
    }

    /**
     * Get notice
     *
     * @return string 
     */
    public function getNotice()
    {
        return $this->notice;
    }
	
    /**
     * returns string representation of the Nachweis
     * @return string
     */
	public function __toString() {
		return $this->getNachweisart().' '.$this->getDateFormatted(). ' ('.$this->getAtemschutzgeraetetraeger().')';
	}
	
	/**
	 * returns date formatted
	 * @param string $format
	 * @return string
	 */
	public function getDateFormatted($format = 'd.m.Y') {
		if($this->date == null)
			return null;
		return $this->date->format($format);
	}
	
	/**
	 * calculates the expiring date of the Nachweis
	 * @return \DateTime
	 */
	public function getExpiringDate() {
		if($this->getNachweisart()->getRequiredFor() == 0) {
			return false;
		} else {
			$expDate = clone $this->date;
			return $expDate->add($this->nachweisart->getDateInterval());
		}
	}
	
	/**
	 * returns the expiring date formatted
	 * @param string $format
	 * @return NULL
	 */
	public function getExpiringDateFormatted($format = 'd.m.Y') {
		$date = $this->getExpiringDate();
		
		if(!$date)
			return false;
		return $date->format($format);
	}
	
	/**
	 * checks if Nachweis is valid
	 * @return boolean
	 */
	public function isValid() {
		if ($this->nachweisart->getRequiredFor() == 0) {
			return true;
		}
		
		$currentDate = new \DateTime();
		$dateClone = clone $this->date;
		$expirationDate = $dateClone->add($this->getNachweisart()->getDateInterval());
		
		return $currentDate->getTimestamp() < $expirationDate->getTimestamp();
	}
	
	/**
	 * checks if nachweis expires in less than a month
	 * @return boolean
	 */
	public function expiresInLessThanOneMonth() {
		if (!$this->isValid() || $this->nachweisart->getRequiredFor() == 0)
			return false;
		
		$currentDate = new \DateTime();
		$interval = new \DateInterval('P1M');
		$currentDate->add($interval);
		
		return $this->getExpiringDate()->getTimestamp() < $currentDate->getTimestamp();
	}
}