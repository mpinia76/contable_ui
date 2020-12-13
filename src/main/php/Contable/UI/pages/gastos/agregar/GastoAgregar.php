<?php
namespace Contable\UI\pages\gastos\agregar;

use Contable\Core\utils\ContableUtils;
use Contable\UI\utils\ContableUIUtils;

use Contable\UI\pages\ContablePage;

use Rasty\utils\XTemplate;
use Contable\Core\model\Gasto;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class GastoAgregar extends ContablePage{

	/**
	 * gasto a agregar.
	 * @var Gasto
	 */
	private $gasto;

	
	public function __construct(){
		
		//inicializamos el gasto.
		$gasto = new Gasto();
		
		$gasto->setFechaHora( new \Datetime() );
		//$gasto->setSucursal( ContableUIUtils::getSucursal() );
		//$gasto->setConcepto( ContableUtils::getConceptoGastoVarios() );
		
		$this->setGasto($gasto);

		
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
//		$menuOption = new MenuOption();
//		$menuOption->setLabel( $this->localize( "form.volver") );
//		$menuOption->setPageName("Gastos");
//		$menuGroup->addMenuOption( $menuOption );
//		
		
		return array($menuGroup);
	}
	
	public function getTitle(){
		return $this->localize( "gasto.agregar.title" );
	}

	public function getType(){
		
		return "GastoAgregar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$gastoForm = $this->getComponentById("gastoForm");
		$gastoForm->fillFromSaved( $this->getGasto() );
		
	}


	public function getGasto()
	{
	    return $this->gasto;
	}

	public function setGasto($gasto)
	{
	    $this->gasto = $gasto;
	}
	
	
					
	public function getMsgError(){
		return "";
	}
}
?>