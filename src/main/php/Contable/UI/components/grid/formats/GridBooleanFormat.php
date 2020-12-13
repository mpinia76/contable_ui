<?php
namespace Contable\UI\components\grid\formats;

use Contable\UI\utils\ContableUIUtils;
use Rasty\Grid\entitygrid\model\GridValueFormat;

use Contable\Core\model\Sucursal;
use Contable\Core\model\Producto;
use Rasty\i18n\Locale;

/**
 * Formato para boolean
 *
 * @author Bernardo
 * @since 01-12-2014
 *
 */

class GridBooleanFormat extends  GridValueFormat{

	public function __construct(){
	
	}
	
	public function format( $value, $item=null ){
		
		if( $value )
			return  "si";
		else $value;	
	}		
	

}