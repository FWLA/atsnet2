<?php
namespace Atemschutz\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * @author Benjamin Ihrig
 */
class SecurityController extends Controller {
	
	/**
	 * Login Controller
	 */
	public function loginAction() {
		$request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
            if($error) {
            	$this->get('session')->getFlashBag()->add('error', 'Sie konnten nicht angemeldet werden. Bitte überprüfen Sie Ihre Daten.');
            }
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            if($error) {
            	$this->get('session')->getFlashBag()->add('error', 'Sie konnten nicht angemeldet werden. Bitte überprüfen Sie Ihre Daten.');
            }
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'AtemschutzCoreBundle:Security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
	}
}