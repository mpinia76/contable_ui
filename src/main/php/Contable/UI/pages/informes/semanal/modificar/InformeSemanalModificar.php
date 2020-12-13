<?php
namespace Contable\UI\pages\informes\semanal\modificar;

use Contable\UI\pages\ContablePage;

use Contable\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Contable\Core\model\InformeSemanal;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class InformeSemanalModificar extends ContablePage{

	/**
	 * informeSemanal a modificar.
	 * @var InformeSemanal
	 */
	private $informeSemanal;

	
	public function __construct(){
		
		//inicializamos el informeSemanal.
		$informeSemanal = new InformeSemanal();
		$this->setInformeSemanal($informeSemanal);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setInformeSemanalOid($oid){
		
		//a partir del id buscamos el informeSemanal a modificar.
		$informeSemanal = UIServiceFactory::getUIInformeSemanalService()->get($oid);
		
		$this->setInformeSemanal($informeSemanal);
		
	}
	
	public function getTitle(){
		return $this->localize( "informeSemanal.modificar.title" );
	}

	public function getType(){
		
		return "InformeSemanalModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
	}

	public function getInformeSemanal(){
		
	    return $this->informeSemanal;
	}

	public function setInformeSemanal($informeSemanal)
	{
	    $this->informeSemanal = $informeSemanal;
	}
}
?>