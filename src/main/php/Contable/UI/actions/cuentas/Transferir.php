<?php
namespace Contable\UI\actions\cuentas;

use Contable\UI\conf\ContableUISetup;

use Contable\UI\utils\ContableUIUtils;
use Contable\Core\utils\ContableUtils;

use Contable\Core\model\Cuenta;

use Contable\UI\service\UIServiceFactory;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;

use Rasty\Forms\input\InputNumber;

/**
 * se realiza una transferencia entre contable
 * 
 * @author Bernardo
 * @since 25-06-2014
 */
class Transferir extends Action{

	
	public function execute(){

		$forward = new Forward();
		$fechaHora = ContableUIUtils::newDateTime( RastyUtils::getParamPOST("fechaHora").' '.date('H:i') );
			
		
		
		
		//tomamos el monto a depositar
		$number = new InputNumber();
		$monto = $number->formatValue( RastyUtils::getParamPOST("monto") );
		$observaciones = RastyUtils::getParamPOST("observaciones");
		$origenOid = RastyUtils::getParamPOST("origen");
		$destinoOid = RastyUtils::getParamPOST("destino");
		
		try {

			$origen = UIServiceFactory::getUICuentaService()->get($origenOid);
			$destino = UIServiceFactory::getUICuentaService()->get($destinoOid);
			
			UIServiceFactory::getUICuentaService()->transferir($origen, $destino, $monto, $observaciones, $fechaHora);
			$forward->setPageName( "AdminHome" );
		
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "Transferir" );
			$forward->addParam( "monto", $monto );
			$forward->addParam( "observaciones", $observaciones );
			
			$forward->addError( Locale::localize($e->getMessage())  );
			
		}
		
		return $forward;
		
	}

}
?>