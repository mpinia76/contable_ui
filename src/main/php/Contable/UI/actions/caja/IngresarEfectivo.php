<?php
namespace Contable\UI\actions\caja;

use Contable\UI\conf\ContableUISetup;

use Contable\UI\utils\ContableUIUtils;
use Contable\Core\utils\ContableUtils;


use Contable\UI\service\UIServiceFactory;
use Contable\Core\model\Transferencia;

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
 * se ingresa efectivo  caja
 * 
 * Es una transferencia entre la caja y la caja chica
 * 
 * @author Bernardo
 * @since 13/04/2015
 */
class IngresarEfectivo extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		//tomamos el monto a ingresar
		$number = new InputNumber();
		$monto = $number->formatValue( RastyUtils::getParamPOST("monto") );
		$observaciones = RastyUtils::getParamPOST("observaciones");
		
		try {

			UIServiceFactory::getUICajaService()->ingresarEfectivo($monto, $observaciones);
			$forward->setPageName( "CajaHome" );
		
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "IngresarEfectivo" );
			$forward->addParam( "monto", $monto );
			$forward->addParam( "observaciones", $observaciones );
			
			$forward->addError( Locale::localize($e->getMessage())  );
			
		}
		
		return $forward;
		
	}

}
?>