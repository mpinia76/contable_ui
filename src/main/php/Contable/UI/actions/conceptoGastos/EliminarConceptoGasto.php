<?php
namespace Contable\UI\actions\conceptoGastos;

use Contable\UI\utils\ContableUIUtils;

use Contable\UI\service\UIServiceFactory;
use Contable\Core\model\ConceptoGasto;
use Contable\Core\utils\ContableUtils;

use Rasty\actions\JsonAction;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;


/**
 * se eliminar un concepto de gasto
 * 
 * @author Marcos
 * @since 09/03/2018
 */
class EliminarConceptoGasto extends JsonAction{

	
	public function execute(){

		try {

			$conceptoGastoOid = RastyUtils::getParamGET("conceptoGastoOid");
			
			//obtenemos la conceptoGasto
			$conceptoGasto = UIServiceFactory::getUIConceptoGastoService()->get($conceptoGastoOid);

			UIServiceFactory::getUIConceptoGastoService()->delete($conceptoGasto);
			
			$result["info"] = Locale::localize("conceptoGasto.borrar.success")  ;
			
		} catch (RastyException $e) {
		
			$result["error"] = Locale::localize($e->getMessage())  ;
			
		}
		
		return $result;		
		
	}
}
?>