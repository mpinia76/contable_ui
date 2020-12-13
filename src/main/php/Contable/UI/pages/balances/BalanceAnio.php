<?php
namespace Contable\UI\pages\balances;

use Contable\UI\pages\ContablePage;

use Contable\UI\service\UIServiceFactory;

use Contable\UI\utils\ContableUIUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;
use Rasty\utils\LinkBuilder;

use Contable\Core\model\Caja;

use Rasty\Grid\filter\model\UICriteria;

use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class BalanceAnio extends ContablePage{

	private $fecha;
	
	public function __construct(){
		

		$this->fecha = new \DateTime();
		
	}

	protected function parseLabels(XTemplate $xtpl){
		
		$xtpl->assign("legend",  $this->localize( "balanceAnio.legend" ) );
		
		
	}

	protected function parseXTemplate(XTemplate $xtpl){
		
		/*labels*/
		$this->parseLabels($xtpl);
		
		
	}
	
	public function getTitle(){
		return $this->localize("balanceAnio.title") ;
	}

	public function getType(){
		
		return "BalanceAnio";
		
	}	


	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
	}
	
		public function setStrFecha($strFecha){
		if( !empty($strFecha) ){
			$fecha = ContableUIUtils::newDateTime($strFecha) ;
			$this->setFecha($fecha);
		}
	}
	
}
?>