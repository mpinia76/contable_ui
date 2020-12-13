<?php
namespace Contable\UI\pages\bancos;

use Contable\UI\service\UIServiceFactory;

use Contable\UI\components\filter\model\UIMovimientoCuentaCriteria;

use Contable\UI\components\grid\model\MovimientoCuentaGridModel;

use Contable\UI\pages\ContablePage;

use Contable\UI\utils\ContableUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;

use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**
 * Página para consultar los movimientos de banco.
 * 
 * @author Bernardo
 * @since 09-06-2014
 * 
 */
class MovimientosBanco extends ContablePage{

	
	public function __construct(){
		
	}
	
	public function getTitle(){
		return $this->localize( "banco.movimientos.title" );
	}

	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
//		$menuOption = new MenuOption();
//		$menuOption->setLabel( $this->localize( "cliente.agregar") );
//		$menuOption->setPageName("ClienteAgregar");
//		$menuOption->setImageSource( $this->getWebPath() . "css/images/add_over_48.png" );
//		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	public function getType(){
		
		return "MovimientosBanco";
		
	}	

	public function getModelClazz(){
		return get_class( new MovimientoCuentaGridModel() );
	}

	public function getUicriteriaClazz(){
		return get_class( new UIMovimientoCuentaCriteria() );
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		$xtpl->assign("legend_operaciones", $this->localize("grid.operaciones") );
		$xtpl->assign("legend_resultados", $this->localize("grid.resultados") );
		
		//$xtpl->assign("agregar_label", $this->localize("cliente.agregar") );
	}

//	public function getBanco(){
//
//		//lo fijamos en la cuenta BAPRO.
//		return UIServiceFactory::getUICuentaService()->getCuentaBAPRO();
//	}
}
?>