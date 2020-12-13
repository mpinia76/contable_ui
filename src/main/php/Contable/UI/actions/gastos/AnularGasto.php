<?php
namespace Contable\UI\actions\gastos;

use Contable\UI\utils\ContableUIUtils;

use Contable\UI\service\UIServiceFactory;
use Contable\Core\model\Gasto;
use Contable\Core\utils\ContableUtils;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;


/**
 * se anula un Gasto
 * 
 * @author Bernardo
 * @since 30/05/2014
 */
class AnularGasto extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		
		//tomamos la gasto
		$gastoOid = RastyUtils::getParamPOST("gastoOid");
		$forward->addParam( "gastoOid", $gastoOid );
		try {

			//la recuperamos la gasto.
			$gasto = UIServiceFactory::getUIGastoService()->get( $gastoOid );
			
			$user = RastySecurityContext::getUser();
			$user = ContableUtils::getUserByUsername($user->getUsername());
			
			UIServiceFactory::getUIGastoService()->anular($gasto, $user);			
			
			$forward->setPageName( "AdminHome" );
		
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "GastoAnular" );
			$forward->addError( Locale::localize($e->getMessage())  );
			
		}
		
		return $forward;
		
	}

}
?>