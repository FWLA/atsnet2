<?php
namespace Atemschutz\NachweisBundle\Entity;

use Atemschutz\NachweisBundle\Tauglichkeit\RequiredFor;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Atemschutz\NachweisBundle\Entity\NachweisartRepository")
 * @ORM\Table(name="nachweisart")
 * 
 * @author Benjamin Ihrig
 */
class Nachweisart {
	
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
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $timeValid;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $requiredFor;

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
     * @return Nachweisart
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
     * Set timeValid
     *
     * @param integer $timeValid
     * @return Nachweisart
     */
    public function setTimeValid($timeValid)
    {
        $this->timeValid = $timeValid;
    
        return $this;
    }

    /**
     * Get timeValid
     *
     * @return integer 
     */
    public function getTimeValid()
    {
        return $this->timeValid;
    }

    /**
     * Set requiredFor
     *
     * @param integer $requiredFor
     * @return Nachweisart
     */
    public function setRequiredFor($requiredFor)
    {
        $this->requiredFor = $requiredFor;
    
        return $this;
    }

    /**
     * Get requiredFor
     *
     * @return integer 
     */
    public function getRequiredFor()
    {
        return $this->requiredFor;
    }
	
    /**
     * returns a string representation of the Nachweisart
     * @return string
     */
	public function __toString() {
		return $this->name;
	}
	
	/**
	 * returns the dateinterval the nachweisart is valid for
	 * @return \DateInterval
	 */
	public function getDateInterval() {
		$interval = 'P'.$this->timeValid.'M';
		return new \DateInterval($interval);
	}
	
	/**
	 * returns a string representation of the required for field
	 * @return string
	 */
	public function getRequiredForTitle() {
		$requiredFors = RequiredFor::getRequiredFors();
		return $requiredFors[$this->getRequiredFor()];
	}
}