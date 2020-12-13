<?php
namespace Contable\UI\components\grid\formats;

use Contable\UI\utils\ContableUIUtils;

use Contable\Core\model\EstadoGasto;
use Rasty\Grid\entitygrid\model\GridValueFormat;
use Rasty\i18n\Locale;

/**
 * Formato para renderizar el estado de un InformeDiarioDebitoCredito
 *
 * @author Bernardo
 * @since 14-04-2015
 *
 */

class GridEstadoInformeDiarioDebitoCreditoFormat extends  GridValueFormat{

	private $pattern;
	
	public function format( $value, $item=null ){
		
		if( !empty($value))
			return  ContableUIUtils::getEstadoInformeDiarioDebitoCreditoLabel($value);
		else $value;	
	}		
	
	public function getColumnCssClass($value, $item=null){
	
		return ContableUIUtils::getEstadoInformeDiarioDebitoCreditoCss($value);
	}
	
	public function getPattern(){
		return $this->pattern;
	}
	
}