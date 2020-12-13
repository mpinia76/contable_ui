<?php

namespace Contable\UI\components\filter\movimiento;

use Contable\UI\service\UIServiceFactory;

use Contable\UI\utils\ContableUIUtils;

use Contable\UI\components\grid\model\MovimientoCuentaGridModel;

use Contable\UI\components\filter\model\UIMovimientoCuentaCriteria;

use Contable\UI\components\filter\model\UIMovimientoCriteria;

use Contable\UI\components\grid\model\MovimientoGridModel;

use Rasty\Grid\filter\Filter;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;

/**
 * Filtro para buscar movimientos de Cuenta
 * 
 * @author Bernardo
 * @since 05-06-2014
 */
class MovimientoCuentaFilter extends MovimientoFilter{
		
	
	public function getType(){
		
		return "MovimientoCuentaFilter";
	}
	
	
	protected function parseXTemplate(XTemplate $xtpl){

		//rellenamos el nombre con el texto inicial
		//$this->fillInput("cuenta", ContableUIUtils::getCaja() );
		
		parent::parseXTemplate($xtpl);
		
		$xtpl->assign("lbl_saldo",  $this->localize( "cuenta.saldo" ) );
		
			
	}
	
}
?>