<?php
namespace Contable\UI\components\grid\formats;

use Contable\UI\utils\ContableUIUtils;

use Contable\Core\model\Sucursal;
use Contable\Core\model\Producto;
use Rasty\i18n\Locale;
use Rasty\Grid\entitygrid\model\GridValueFormat;

/**
 * Formato para porcentaje
 *
 * @author Bernardo
 * @since 10-06-2014
 *
 */

class GridPorcentajeFormat extends  GridValueFormat{

	public function __construct(){
	
	}
	
	public function format( $value, $item=null ){
		
		if( $value !=null )
			return  ContableUIUtils::formatPorcentajeToView($value);
		else $value;	
	}		
	

}