<?php

namespace Contable\UI\components\header;

use Contable\UI\utils\ContableUIUtils;

use Rasty\components\RastyComponent;
use Rasty\utils\RastyUtils;
use Rasty\utils\XTemplate;

use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;
use Rasty\Menu\menu\model\MenuActionOption;
use Rasty\Menu\menu\model\SubmenuOption;

class HeaderNav extends RastyComponent{

	private $title;
	
	private $pageMenuGroups;

	public function __construct(){
		$this->pageMenuGroups = array();
		//$this->setTitle($this->localize("app.title"));
	}
	
	public function getType(){
		
		return "HeaderNav";
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		
		//$xtpl->assign("contable_titulo", $this->localize("app.title"));
		$titles = array();
		$titles[] = $this->localize("app.title");
		$titles[] = $this->getTitle();
		
		$xtpl->assign("contable_titulo", implode(" / ", $titles));
		
		$xtpl->assign("menu_page", $this->localize("menu.page"));
		$xtpl->assign("menu_main", $this->localize("menu.main"));
		
	}
	
	public function getMainMenuGroups(){
		
		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		//$menuGroup = new MenuGroup();
		$menuGroups=array();
		if( ContableUIUtils::isAdminLogged()) {

			$menuOption = new MenuOption();
			$menuOption->setLabel( $this->localize( "menu.admin_home") );
			$menuOption->setPageName( "AdminHome" );
			//$menuOption->setImageSource( $this->getWebPath() . "css/images/empleado_home_48.png" );
			$menuOption->setIconClass("icon-admin_home");
			
			//$menuGroup->addMenuOption( $menuOption );
//			$menuGroups[] = $menuOption;
			
		}

		
		
		if( ContableUIUtils::isAdminLogged() ){
			
			$menuGroups[] =  $this->getMenuAdmin() ;
			$menuGroups[] =  $this->getMenuCuentas() ;
			//$menuGroup->addMenuOption( $this->getMenuBancos() );
			//$menuGroup->addMenuOption( $this->getMenuSocios() );
			//$menuGroup->addMenuOption( $this->getMenuGastos() );
			
			
			
			//$menuGroup->addMenuOption( $this->getMenuAgencia() );
			//$menuGroups[] =  $this->getMenuInformes();
			
			//$menuGroups[] =  $this->getMenuReportes();
			
		}

		
		//return array($menuGroup);
		return $menuGroups;
	}
	
public function getMenuAdmin(){
		
		$menuGroup = new MenuGroup();
		$menuGroup->setLabel( $this->localize( "menu.admin") );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.conceptoGastos") );
		$menuOption->setPageName( "ConceptoGastos" );
		
		
		$menuGroup->addMenuOption( $menuOption );
		
		
		
		
		
		
		
		
		
		
		$submenu = new SubmenuOption($menuGroup);
		
		return $submenu;
	}
	
	public function getPageMenuGroups(){
		
		return $this->pageMenuGroups;
	}

	public function setPageMenuGroups($pageMenuGroups)
	{
	    $this->pageMenuGroups = $pageMenuGroups;
	}

	public function getTitle()
	{
	    return $this->title;
	}

	public function setTitle($title)
	{
		if(!empty($title))
	    	$this->title = $title;
	}
	
	
	
	public function getMenuBancos(){
		
		$menuGroup = new MenuGroup();
		$menuGroup->setLabel( $this->localize( "menu.bancos") );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.movimientos_banco") );
		$menuOption->setPageName( "MovimientosBanco" );
		//$menuOption->setImageSource( $this->getWebPath() . "css/images/movimientos_32.png" );
		$menuOption->setIconClass("icon-movimientos");
		$menuGroup->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "banco.depositar") );
		$menuOption->setPageName( "DepositarEfectivo" );
		$menuOption->setIconClass("icon-depositar-efectivo");
		//$menuOption->setImageSource( $this->getWebPath() . "css/images/depositar_32.png" );
		$menuGroup->addMenuOption( $menuOption );
		
		$submenu = new SubmenuOption($menuGroup);
		//$submenu->setImageSource( $this->getWebPath() . "css/images/bancos_32.png" );
		$submenu->setIconClass("icon-bancos");
		
		return $submenu;	
	}
	
	public function getMenuGastos(){

		$menuGroup = new MenuGroup();
		$menuGroup->setLabel( $this->localize( "menu.gastos") );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.gastos.listar") );
		$menuOption->setPageName( "Gastos" );
		$menuOption->setIconClass("icon-gastos");
		//$menuOption->setImageSource( $this->getWebPath() . "css/images/gastos_32.png" );
		$menuGroup->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.gastos.agregar") );
		$menuOption->setPageName( "GastoAgregar" );
		//$menuOption->setImageSource( $this->getWebPath() . "css/images/add_over_48.png" );
		$menuOption->setIconClass("icon-nuevo-gasto");
		$menuGroup->addMenuOption( $menuOption );
		
		$submenu = new SubmenuOption($menuGroup);
		//$submenu->setImageSource( $this->getWebPath() . "css/images/gastos_32.png" );
		$submenu->setIconClass("icon-gastos");
				
		return $submenu;
	}

	
	
	public function getMenuCuentas(){
		
		$menuGroup = new MenuGroup();
		$menuGroup->setLabel( $this->localize( "menu.cuentas") );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.movimientos_banco") );
		$menuOption->setPageName( "MovimientosBanco" );
		//$menuOption->setImageSource( $this->getWebPath() . "css/images/movimientos_32.png" );
		$menuOption->setIconClass("icon-movimientos");
		$menuGroup->addMenuOption( $menuOption );
		
		
		

		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "banco.depositar") );
		$menuOption->setPageName( "DepositarEfectivo" );
		$menuOption->setIconClass("icon-depositar-efectivo");
		//$menuOption->setImageSource( $this->getWebPath() . "css/images/depositar_32.png" );
		$menuGroup->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.transferir") );
		$menuOption->setIconClass("icon-movimientos");
		$menuOption->setPageName( "Transferir");
		$menuGroup->addMenuOption( $menuOption );
		
		//$menuGroup->addMenuOption( $this->getMenuGastos() );
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.gastos.listar") );
		$menuOption->setPageName( "Gastos" );
		$menuOption->setIconClass("icon-gastos");
		$menuGroup->addMenuOption( $menuOption );
		
		
		$submenu = new SubmenuOption($menuGroup);
		$submenu->setIconClass("icon-empleados");
		return $submenu;
	}

	

	public function getMenuInformes(){

		$menuGroupInformes = new MenuGroup();
		$menuGroupInformes->setLabel( $this->localize( "menu.informes") );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.informesSemanales.listar") );
		$menuOption->setPageName( "InformesSemanales" );
		$menuOption->setIconClass("icon-informes-semanales");
		$menuGroupInformes->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.informesSemanales.agregar") );
		$menuOption->setPageName( "InformeSemanalAgregar" );
		$menuOption->setIconClass("icon-agregar");
		$menuGroupInformes->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.informesDiariosDebitoCredito.listar") );
		$menuOption->setPageName( "InformesDiariosDebitoCredito" );
		$menuOption->setIconClass("icon-informes-debito-credito");
		$menuGroupInformes->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.informesDiariosDebitoCredito.agregar") );
		$menuOption->setPageName( "InformeDiarioDebitoCreditoAgregar" );
		$menuOption->setIconClass("icon-agregar");
		$menuGroupInformes->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.informesDiariosComision.listar") );
		$menuOption->setPageName( "InformesDiariosComision" );
		$menuOption->setIconClass("icon-informes-comision");
		$menuGroupInformes->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.informesDiariosComision.agregar") );
		$menuOption->setPageName( "InformeDiarioComisionAgregar" );
		$menuOption->setIconClass("icon-agregar");
		$menuGroupInformes->addMenuOption( $menuOption );
		
		$submenuInformes = new SubmenuOption($menuGroupInformes);
		$submenuInformes->setIconClass("icon-informes");
		
		return $submenuInformes;
		
	}
	
	public function getMenuReportes(){

		$menuGroupStats = new MenuGroup();
		$menuGroupStats->setLabel( $this->localize( "menu.stats") );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.stats.reportes") );
		$menuOption->setPageName( "Reportes" );
		$menuOption->setIconClass( "icon-stats" );
		$menuGroupStats->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.balances.dia") );
		$menuOption->setPageName( "BalanceDia" );
		$menuOption->setIconClass( "icon-stats" );
		$menuGroupStats->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.balances.mes") );
		$menuOption->setPageName( "BalanceMes" );
		$menuOption->setIconClass( "icon-stats" );
		$menuGroupStats->addMenuOption( $menuOption );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.balances.anio") );
		$menuOption->setPageName( "BalanceAnio" );
		$menuOption->setIconClass( "icon-stats" );
		$menuGroupStats->addMenuOption( $menuOption );
		
		$submenu = new SubmenuOption($menuGroupStats);
		$submenu->setIconClass("icon-stats");
		
		return $submenu;
	
	}
}
?>