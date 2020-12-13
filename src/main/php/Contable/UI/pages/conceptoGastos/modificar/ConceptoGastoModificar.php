<?php
namespace Contable\UI\pages\conceptoGastos\modificar;

use Contable\UI\pages\ContablePage;

use Contable\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Contable\Core\model\ConceptoGasto;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class ConceptoGastoModificar extends ContablePage{

	/**
	 * conceptoGasto a modificar.
	 * @var ConceptoGasto
	 */
	private $conceptoGasto;

	
	public function __construct(){
		
		//inicializamos el conceptoGasto.
		$conceptoGasto = new ConceptoGasto();
		$this->setConceptoGasto($conceptoGasto);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setConceptoGastoOid($oid){
		
		//a partir del id buscamos el conceptoGasto a modificar.
		$conceptoGasto = UIServiceFactory::getUIConceptoGastoService()->get($oid);
		
		$this->setConceptoGasto($conceptoGasto);
		
	}
	
	public function getTitle(){
		return $this->localize( "conceptoGasto.modificar.title" );
	}

	public function getType(){
		
		return "ConceptoGastoModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
	}

	public function getConceptoGasto(){
		
	    return $this->conceptoGasto;
	}

	public function setConceptoGasto($conceptoGasto)
	{
	    $this->conceptoGasto = $conceptoGasto;
	}
}
?>