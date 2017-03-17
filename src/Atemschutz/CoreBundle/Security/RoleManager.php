<?php
namespace Atemschutz\CoreBundle\Security;

use Atemschutz\CoreBundle\Entity\User;

class RoleManager {
	
	/**
	 * 
	 * @param array $previousRoles
	 * @param array $newRoles
	 * @param User $user
	 */
	public function refactorRoles(array $previousRoles, array $newRoles, User $user) {
		if (in_array(Roles::$CORE_SADMIN, $user->getRoles())) {
			return $newRoles;
		}
		if (in_array(Roles::$CORE_ADMIN, $user->getRoles())) {
			if (in_array(Roles::$NACHWEIS_ADMIN, $previousRoles) && !in_array(Roles::$NACHWEIS_ADMIN, $newRoles)) {
				array_push($newRoles, Roles::$NACHWEIS_ADMIN);
			}
			return $newRoles;
		}
		return $newRoles;
	}
}