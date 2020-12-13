<?php
namespace Contable\UI\components\grid\formats;

use Contable\UI\utils\ContableUIUtils;

use Contable\Core\model\EstadoGasto;
use Rasty\Grid\entitygrid\model\GridValueFormat;
use Rasty\i18n\Locale;

/**
 * Formato para renderizar el estado de un gasto
 *
 * @author Bernardo
 * @since 29-05-2014
 *
 */

class GridEstadoGastoFormat extends  GridValueFormat{

	private $pattern;
	
	public function format( $value, $item=null ){
		
		if( !empty($value))
			return  Locale::localize( EstadoGasto::getLabel( $value ) );
		else $value;	
	}		
	
	public function getColumnCssClass($value, $item=null){
	
		return ContableUIUtils::getEstadoGastoCss($value);
	}
	
	public function getPattern(){
		return $this->pattern;
	}
	
}