<?php
namespace Contable\UI\actions\gastos;

use Contable\UI\utils\ContableUIUtils;
use Contable\Core\utils\ContableUtils;


use Contable\UI\service\UIServiceFactory;
use Contable\Core\model\Gasto;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;

use Rasty\utils\Logger;


/**
 * se paga un gasto
 * 
 * @author Bernardo
 * @since 29/05/2014
 */
class PagarGasto extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		//tomamos la gasto y la cuenta con la cuenta se paga
		$gastoOid = RastyUtils::getParamGET("gastoOid");
		$cuentaOid = RastyUtils::getParamGET("cuentaOid");
		
		$backTo = ContableUIUtils::isAdminLogged()?"AdminHome":"CajaHome";
		
		$forward->addParam( "gastoOid", $gastoOid );
		try {
			
			$fechaHora = ContableUIUtils::newDateTime( RastyUtils::getParamGET("fechaHora").' '.date('H:i') );
			
			//recuperamos el gasto.
			$gasto = UIServiceFactory::getUIGastoService()->get( $gastoOid );
			
			//recuperamos la cuenta
			$cuenta = UIServiceFactory::getUICuentaService()->get( $cuentaOid );

			$user = RastySecurityContext::getUser();
			$user = ContableUtils::getUserByUsername($user->getUsername());
			
			UIServiceFactory::getUIGastoService()->pagar($gasto, $cuenta, $user, $fechaHora);			
			
			$forward->setPageName( $backTo );
		
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "GastoPagar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			
		}
		
		return $forward;
		
	}

}
?>