<?php
namespace Contable\UI\pages\pagos;

use Contable\UI\pages\ContablePage;

use Contable\UI\components\filter\model\UIPagoCriteria;

use Contable\UI\components\grid\model\PagoGridModel;

use Contable\UI\service\UIPagoService;

use Contable\UI\utils\ContableUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;

use Contable\Core\model\Pago;
use Contable\Core\criteria\PagoCriteria;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**
 * Página para consultar los pagos.
 * 
 * @author Bernardo
 * @since 13-06-2014
 * 
 */
class Pagos extends ContablePage{

	
	public function __construct(){
		
	}
	
	public function getTitle(){
		return $this->localize( "pagos.title" );
	}

	public function getMenuGroups(){

		$menuGroup = new MenuGroup();
		
		
		return array($menuGroup);
	}
	
	public function getType(){
		
		return "Pagos";
		
	}	

	public function getModelClazz(){
		return get_class( new PagoGridModel() );
	}

	public function getUicriteriaClazz(){
		return get_class( new UIPagoCriteria() );
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		$xtpl->assign("legend_operaciones", $this->localize("grid.operaciones") );
		$xtpl->assign("legend_resultados", $this->localize("grid.resultados") );
		
	}

}
?>