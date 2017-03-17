<?php
namespace Atemschutz\CoreBundle\Security;

/**
 * @author Benjamin Ihrig
 */
class Roles {
	
	static public $USER = "ROLE_USER";
	
	static public $CORE_MANAGER = "ROLE_CORE_MANAGER";
	static public $CORE_ADMIN = "ROLE_CORE_ADMIN";
	static public $CORE_SADMIN = "ROLE_CORE_SADMIN";
	
	static public $NACHWEIS_VIEWER = "ROLE_NACHWEIS_VIEWER";
	static public $NACHWEIS_MANAGER = "ROLE_NACHWEIS_MANAGER";
	static public $NACHWEIS_ADMIN = "ROLE_NACHWEIS_ADMIN";
	
	private $roles;
	
	/**
	 * 
	 */
	public function __construct() {
		$this->roles[Roles::$USER] = 'Benutzer';
		
		$this->roles[Roles::$CORE_MANAGER] = 'Systemmanager';
		$this->roles[Roles::$CORE_ADMIN] = 'Systemadmin';
		$this->roles[Roles::$CORE_SADMIN] = 'Superadmin';
		
		$this->roles[Roles::$NACHWEIS_VIEWER] = 'Nachweis Sichter';
		$this->roles[Roles::$NACHWEIS_MANAGER] = 'Nachweis Manager';
		$this->roles[Roles::$NACHWEIS_ADMIN] = 'Nachweis Admin';
	}
	
	/**
	 * Returns a displayable name of the role.
	 * @param unknown $role
	 */
	public function getRolename($role) {
		return $this->roles[$role];
	}
}