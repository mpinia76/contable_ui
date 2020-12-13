<?php
namespace Contable\UI\pages\informes\comisiones\agregar;

use Contable\Core\utils\ContableUtils;
use Contable\UI\utils\ContableUIUtils;

use Contable\UI\pages\ContablePage;

use Rasty\utils\XTemplate;
use Contable\Core\model\InformeDiarioComision;
use Contable\Core\model\EstadoInformeDiarioComision;

use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class InformeDiarioComisionAgregar extends ContablePage{

	/**
	 * informeDiarioComision a agregar.
	 * @var InformeDiarioComision
	 */
	private $informeDiarioComision;

	
	public function __construct(){
		
		//inicializamos el informeDiarioComision.
		$informeDiarioComision = new InformeDiarioComision();
		
		$informeDiarioComision->setSucursal( ContableUIUtils::getSucursal() );
		$informeDiarioComision->setFecha( new \DateTime() );
		
		$this->setInformeDiarioComision($informeDiarioComision);

		
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
//		$menuOption = new MenuOption();
//		$menuOption->setLabel( $this->localize( "form.volver") );
//		$menuOption->setPageName("InformeDiarioComisions");
//		$menuGroup->addMenuOption( $menuOption );
//		
		
		return array($menuGroup);
	}
	
	public function getTitle(){
		return $this->localize( "informeDiarioComision.agregar.title" );
	}

	public function getType(){
		
		return "InformeDiarioComisionAgregar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
		
	}


	public function getInformeDiarioComision()
	{
	    return $this->informeDiarioComision;
	}

	public function setInformeDiarioComision($informeDiarioComision)
	{
	    $this->informeDiarioComision = $informeDiarioComision;
	}
	
	
					
	public function getMsgError(){
		return "";
	}
}
?>