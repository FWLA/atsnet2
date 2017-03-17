<?php
namespace Atemschutz\NachweisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Atemschutz\NachweisBundle\Entity\G26Repository")
 * @ORM\Table(name="g26")
 * 
 * @author Benjamin Ihrig
 */
class G26 {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="date")
	 */
	private $date;
	
	/**
	 * @ORM\Column(type="date")
	 */
	private $duedate;
	
	/**
	 * @ORM\Column(type="boolean")
	 */
	private $valid = true;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $classification;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Atemschutzgeraetetraeger", inversedBy="g26s")
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
     * Set date
     *
     * @param \DateTime $date
     * @return G26
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
     * Set duedate
     *
     * @param \DateTime $duedate
     * @return G26
     */
    public function setDuedate($duedate)
    {
        $this->duedate = $duedate;
    
        return $this;
    }

    /**
     * Get duedate
     *
     * @return \DateTime 
     */
    public function getDuedate()
    {
        return $this->duedate;
    }

    /**
     * Set classification
     *
     * @param integer $classification
     * @return G26
     */
    public function setClassification($classification)
    {
        $this->classification = $classification;
    
        return $this;
    }

    /**
     * Get classification
     *
     * @return integer 
     */
    public function getClassification()
    {
        return $this->classification;
    }

    /**
     * Set atemschutzgeraetetraeger
     *
     * @param \Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger $atemschutzgeraetetraeger
     * @return G26
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
     * Set valid
     *
     * @param boolean $valid
     * @return G26
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    
        return $this;
    }

    /**
     * Get valid
     *
     * @return boolean 
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set atemschutzgeraetewart
     *
     * @param \Atemschutz\CoreBundle\Entity\User $atemschutzgeraetewart
     * @return G26
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
     * Set notice
     *
     * @param string $notice
     * @return G26
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
     * returns the date formatted
     * @param string $format
     * @return NULL
     */
	public function getDateFormatted($format = 'd.m.Y') {
		if($this->date == null)
			return null;
		return $this->date->format($format);
	}
	
	/**
	 * returns the duedate formatted
	 * @param string $format
	 * @return NULL
	 */
	public function getDueDateFormatted($format = 'd.m.Y') {
		if($this->duedate == null)
			return null;
		return $this->duedate->format($format);
	}
	
	/**
	 * checks if the G26 is valid
	 * @return boolean
	 */
	public function isInvalid() {
		$currentDate = new \DateTime();
		
		return (!$this->getValid()) || ($currentDate->getTimestamp() > $this->getDuedate()->getTimestamp());
	}
	
	/**
	 * checks if g26 expires in less than one month
	 * 
	 * returns false if already expired
	 * 
	 * @return boolean
	 */
	public function expiresInLessThanOneMonth() {
		if($this->isInvalid())
			return true;
		
		$currentDate = new \DateTime();
		$interval = new \DateInterval('P1M');
		
		$currentDate->add($interval);
		
		return $this->duedate->getTimestamp() < $currentDate->getTimestamp();
	}
}