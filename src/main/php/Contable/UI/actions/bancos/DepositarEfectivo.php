<?php
namespace Contable\UI\actions\bancos;

use Contable\UI\conf\ContableUISetup;

use Contable\UI\utils\ContableUIUtils;
use Contable\Core\utils\ContableUtils;

use Contable\Core\model\Banco;

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
 * se deposita dinero en un banco
 * 
 * Es una transferencia entre la caja chica y el banco seleccionado
 * 
 * @author Marcos
* @since 02/08/2018
 */
class DepositarEfectivo extends Action{

	
	public function execute(){

		$forward = new Forward();
		$fechaHora = ContableUIUtils::newDateTime( RastyUtils::getParamPOST("fechaHora").' '.date('H:i') );
		//tomamos el monto a depositar
		$number = new InputNumber();
		$monto = $number->formatValue( RastyUtils::getParamPOST("monto") );
		$observaciones = RastyUtils::getParamPOST("observaciones");
		$bancoOid = RastyUtils::getParamPOST("banco");
		
		try {

			$banco = UIServiceFactory::getUIBancoService()->get($bancoOid);
			
			UIServiceFactory::getUIBancoService()->depositarEfectivo($banco, $monto, $observaciones, $fechaHora);
			$forward->setPageName( "AdminHome" );
		
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "DepositarEfectivo" );
			$forward->addParam( "monto", $monto );
			$forward->addParam( "observaciones", $observaciones );
			
			$forward->addError( Locale::localize($e->getMessage())  );
			
		}
		
		return $forward;
		
	}

}
?>