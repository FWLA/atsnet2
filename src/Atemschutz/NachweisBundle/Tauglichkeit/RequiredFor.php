<?php
namespace Atemschutz\NachweisBundle\Tauglichkeit;

/**
 * @author Benjamin Ihrig
 */
class RequiredFor {
	
	private static $none = 0;
	private static $none_title = 'keine';
	private static $ats1 = 1;
	private static $ats1_title = 'Atemschutz (ATS 1)';
	private static $ats2 = 2;
	private static $ats2_title = 'Chemikalienschutzanzug (ATS 2)';
	
	/**
	 * @return multitype:string
	 */
	public static function getRequiredFors() {
		$requiredFors = array();
		
		$requiredFors[self::$none] = self::$none_title;
		$requiredFors[self::$ats1] = self::$ats1_title;
		$requiredFors[self::$ats2] = self::$ats2_title;
		
		return $requiredFors;
	}
}