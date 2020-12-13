<?php
namespace Contable\UI\pages\informes\comisiones\modificar;

use Contable\UI\pages\ContablePage;

use Contable\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Contable\Core\model\InformeDiarioComision;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class InformeDiarioComisionModificar extends ContablePage{

	/**
	 * informeDiarioComision a modificar.
	 * @var InformeDiarioComision
	 */
	private $informeDiarioComision;

	
	public function __construct(){
		
		//inicializamos el informeDiarioComision.
		$informeDiarioComision = new InformeDiarioComision();
		$this->setInformeDiarioComision($informeDiarioComision);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setInformeDiarioComisionOid($oid){
		
		//a partir del id buscamos el informeDiarioComision a modificar.
		$informeDiarioComision = UIServiceFactory::getUIInformeDiarioComisionService()->get($oid);
		
		$this->setInformeDiarioComision($informeDiarioComision);
		
	}
	
	public function getTitle(){
		return $this->localize( "informeDiarioComision.modificar.title" );
	}

	public function getType(){
		
		return "InformeDiarioComisionModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
	}

	public function getInformeDiarioComision(){
		
	    return $this->informeDiarioComision;
	}

	public function setInformeDiarioComision($informeDiarioComision)
	{
	    $this->informeDiarioComision = $informeDiarioComision;
	}
}
?>