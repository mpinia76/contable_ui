<?php
namespace Contable\UI\pages\informes\debitosCreditos\agregar;

use Contable\Core\utils\ContableUtils;
use Contable\UI\utils\ContableUIUtils;

use Contable\UI\pages\ContablePage;

use Rasty\utils\XTemplate;
use Contable\Core\model\InformeDiarioDebitoCredito;
use Contable\Core\model\EstadoInformeDiarioDebitoCredito;

use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class InformeDiarioDebitoCreditoAgregar extends ContablePage{

	/**
	 * informeDiarioDebitoCredito a agregar.
	 * @var InformeDiarioDebitoCredito
	 */
	private $informeDiarioDebitoCredito;

	
	public function __construct(){
		
		//inicializamos el informeDiarioDebitoCredito.
		$informeDiarioDebitoCredito = new InformeDiarioDebitoCredito();
		
		$informeDiarioDebitoCredito->setFecha( new \DateTime() );
		$informeDiarioDebitoCredito->setSucursal( ContableUIUtils::getSucursal() );
		$informeDiarioDebitoCredito->setEstado ( EstadoInformeDiarioDebitoCredito::Pendiente ) ;
		
		$this->setInformeDiarioDebitoCredito($informeDiarioDebitoCredito);

		
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
//		$menuOption = new MenuOption();
//		$menuOption->setLabel( $this->localize( "form.volver") );
//		$menuOption->setPageName("InformeDiarioDebitoCreditos");
//		$menuGroup->addMenuOption( $menuOption );
//		
		
		return array($menuGroup);
	}
	
	public function getTitle(){
		return $this->localize( "informeDiarioDebitoCredito.agregar.title" );
	}

	public function getType(){
		
		return "InformeDiarioDebitoCreditoAgregar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
		
	}


	public function getInformeDiarioDebitoCredito()
	{
	    return $this->informeDiarioDebitoCredito;
	}

	public function setInformeDiarioDebitoCredito($informeDiarioDebitoCredito)
	{
	    $this->informeDiarioDebitoCredito = $informeDiarioDebitoCredito;
	}
	
	
					
	public function getMsgError(){
		return "";
	}
}
?>