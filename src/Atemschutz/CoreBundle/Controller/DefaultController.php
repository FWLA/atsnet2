<?php

namespace Atemschutz\CoreBundle\Controller;

use Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger;
use Atemschutz\NachweisBundle\Entity\Einsatzart;
use Atemschutz\NachweisBundle\Entity\G26;
use Atemschutz\NachweisBundle\Entity\Nachweis;
use Atemschutz\NachweisBundle\Entity\Nachweisart;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Benjamin Ihrig
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="default_home")
     * @Template()
     */
    public function indexAction() {
        return $this->render(
        		'AtemschutzCoreBundle:Default:index.html.twig'
        );
    }
    
    /**
     * @Secure(roles="ROLE_CORE_SADMIN")
     * @Route("/migrate", name="migrate")
     */
    public function migrateAction() {
    	set_time_limit(600);
    	$em = $this->getDoctrine()->getManager();
    	
    	mysql_connect('localhost', 'atsnet', 'flolaweb112');
    	mysql_select_db('atsnet');
    	mysql_query("SET CHARACTER SET utf8");
    	mysql_query("SET NAMES utf8");
    	
    	$einsatzartBrand = new Einsatzart();
    	$einsatzartBrand->setName('Brandeinsatz');
    	$em->persist($einsatzartBrand);
    	$einsatzartHilfe = new Einsatzart();
    	$einsatzartHilfe->setName('Hilfeleistung');
    	$em->persist($einsatzartHilfe);
    	$einsatzartAusb = new Einsatzart();
    	$einsatzartAusb->setName('Ausbildung');
    	$em->persist($einsatzartAusb);
    	
    	$em->flush();
    	
    	$query_nachweisart = 'SELECT * FROM ats_nachweise;';
    	$result_nachweise = mysql_query($query_nachweisart);
    	$nachweisarten = array();
    	while($row = mysql_fetch_object($result_nachweise)) {
    		$nachweisart = new Nachweisart();
    		$nachweisart->setName($row->name);
    		$nachweisart->setRequiredFor($row->affordfor);
    		$nachweisart->setTimeValid($row->months == '0000-00-00' ? null : 12);
    		
    		$em->persist($nachweisart);
    		$em->flush();
    		$nachweisarten[$row->id] = $nachweisart;
    	}
    	
    	$query_atsgt = 'SELECT * FROM ats_users ORDER BY nachname ASC, vorname ASC;';
    	$result_atsgt = mysql_query($query_atsgt);
    	
    	$organisation = $this->getDoctrine()
    		->getRepository('AtemschutzCoreBundle:Organisation')
    		->find(1);
    	$atemschutzgeraetewart = $this->getDoctrine()
    		->getRepository('AtemschutzCoreBundle:User')
    		->find(1);
    	
    	while($row = mysql_fetch_object($result_atsgt)) {
    		$atemschutzgeraetetraeger = new Atemschutzgeraetetraeger();
    		$atemschutzgeraetetraeger->setFirstname($row->vorname);
    		$atemschutzgeraetetraeger->setLastname($row->nachname);
    		$atemschutzgeraetetraeger->setIsActive($row->aktiv);
    		$atemschutzgeraetetraeger->setOrganisation($organisation);
    		$gebdatum = $row->gebdatum == '0000-00-00' ? null : $row->gebdatum;
    		$atemschutzgeraetetraeger->setBirthdate($gebdatum == null ? null : new \DateTime($gebdatum));
    		$ats1 = $row->ats1 == '0000-00-00' ? null : $row->ats1;
    		$atemschutzgeraetetraeger->setAts1($ats1 == null ? null : new \DateTime($ats1));
    		$ats2 = $row->ats2 == '0000-00-00' ? null : $row->ats2;
    		$atemschutzgeraetetraeger->setAts2($ats2 == null ? null : new \DateTime($ats2));
    		
    		$em->persist($atemschutzgeraetetraeger);
    		$em->flush();
    		
    		if($row->g26 != null && $row->g26 != '0000-00-00') {
	    		$g26 = new G26();
	    		$g26->setAtemschutzgeraetetraeger($atemschutzgeraetetraeger);
	    		$g26->setClassification(3);
	    		$date = $row->g26 == '0000-00-00' ? null : $row->g26;
	    		$g26->setDate(new \DateTime($date));
	    		$duedate = $row->nextg26 == '0000-00-00' ? null : $row->nextg26;
	    		$g26->setDuedate(new \DateTime($duedate));
	    		$g26->setAtemschutzgeraetewart($atemschutzgeraetewart);
	    		
	    		$em->persist($g26);
	    		$em->flush();
    		}
    		
    		$query_nachweise = "SELECT * FROM ats_nachweislogbuch WHERE userid = '$row->id'";
    		$result_nachweise = mysql_query($query_nachweise);
    		
    		while($nachweisRow = mysql_fetch_object($result_nachweise)) {
    			$nachweis = new Nachweis();
    			$nachweis->setAtemschutzgeraetetraeger($atemschutzgeraetetraeger);
    			$nachweis->setAtemschutzgeraetewart($atemschutzgeraetewart);
    			$nachweis->setDate(new \DateTime($nachweisRow->datum));
    			$nachweis->setEinsatzNummer($nachweisRow->einsatznr == 0 ? null : $nachweisRow->einsatznr);
    			$nachweis->setNachweisart($nachweisarten[$nachweisRow->nachwid]);
    			$nachweis->setTime($nachweisRow->dauer);
    			$nachweis->setLocation($nachweisRow->ort);
    			switch($nachweisRow->art) {
    				case 'Brandeinsatz':
    					$nachweis->setEinsatzart($einsatzartBrand);
    					break;
    				case 'Hilfeleistung':
    					$nachweis->setEinsatzart($einsatzartHilfe);
    					break;
    				case 'Ausbildung':
    					$nachweis->setEinsatzart($einsatzartAusb);
    			}
    			
    			$em->persist($nachweis);
    			$em->flush();
    		}
    	}
    	
    	mysql_close();
    	
    	
    	return new Response('done');
    }
}
