<?php
namespace Contable\UI\actions\login;

use Contable\UI\utils\ContableUIUtils;

use Contable\UI\service\UIServiceFactory;

use Contable\Core\utils\ContableUtils;


use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;



/**
 * se realiza el login contra el core.
 * 
 * @author Bernardo
 * @since 24/05/2014
 */
class Login extends Action{

	public function isSecure(){
		return false;
	}
	
	public function execute(){

		$forward = new Forward();			
		try {

			
			RastySecurityContext::login( RastyUtils::getParamPOST("username"), RastyUtils::getParamPOST("password") );
			
			
		
			$user = RastySecurityContext::getUser();
			
			$user = ContableUtils::getUserByUsername($user->getUsername());
		
			if( ContableUtils::isAdmin($user)){
				
				
				ContableUIUtils::loginAdmin($user);
				
			}else{
				
				//TODO
			}
			
			/*ContableUIUtils::login( $empleado );		
			//buscamos la caja que esté abierta para el empleado
			$caja = UIServiceFactory::getUICajaService()->getCajaAbiertaByEmpleado($empleado);
			ContableUIUtils::setCaja($caja);*/

			if( ContableUIUtils::isAdminLogged() )
				$forward->setPageName( $this->getForwardAdmin() );
			
			else //si no hay caja abierta, lo enviamos a abrir una nueva. 	
				$forward->setPageName( $this->getForwardCaja() );
				
		} catch (RastyException $e) {
		
			$forward->setPageName( $this->getErrorForward() );
			$forward->addError( $e->getMessage() );
			
		}
		
		return $forward;
		
	}
	
	

	protected function getForwardAdmin(){
		return "AdminHome";
	}
	
	protected function getForwardCaja(){
		//si hay cajas abiertas lo enviamos a seleccionar una de ellas.
		
		if( ContableUIUtils::isAdminLogged() )
		
			$cajas = UIServiceFactory::getUICajaService()->getCajasAbiertas();
			
		else 
			
			$cajas = UIServiceFactory::getUICajaService()->getCajasAbiertas( new \DateTime() );
		
		
		if(count($cajas) > 0)
			return "SeleccionarCaja";
		else	
			return "AbrirCaja";
	}
	
	protected function getErrorForward(){
		return "Login";
	}
}
?>