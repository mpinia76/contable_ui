<?php
namespace Contable\UI\components\grid\formats;

use Contable\UI\utils\ContableUIUtils;
use Rasty\Grid\entitygrid\model\GridValueFormat;

use Contable\Core\model\Sucursal;
use Contable\Core\model\Producto;
use Rasty\i18n\Locale;

/**
 * Formato para imprte
 *
 * @author Bernardo
 * @since 04-06-2014
 *
 */

class GridImporteFormat extends  GridValueFormat{

	public function __construct(){
	
	}
	
	public function format( $value, $item=null ){
		
		if( $value !=null )
			return  ContableUIUtils::formatMontoToView($value);
		else $value;	
	}		
	

}