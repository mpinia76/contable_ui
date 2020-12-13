<?php
namespace Contable\UI\pages\gastos\pagar;

use Contable\UI\service\UIServiceFactory;

use Contable\Core\utils\ContableUtils;
use Contable\UI\utils\ContableUIUtils;

use Contable\UI\pages\ContablePage;

use Rasty\utils\XTemplate;
use Contable\Core\model\Gasto;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

use Rasty\utils\LinkBuilder;

class GastoPagar extends ContablePage{

	/**
	 * gasto a pagar.
	 * @var Gasto
	 */
	private $gasto;

	private $error;

	private $backTo;
		
	public function __construct(){
		
		//inicializamos el gasto.
		$gasto = new Gasto();
		
		
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
		return $this->localize( "gasto.pagar.title" );
	}

	public function getType(){
		
		return "GastoPagar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
		$xtpl->assign( "gasto_legend", $this->localize( "pagar.gasto.legend") );
		$xtpl->assign( "forma_pago_legend", $this->localize( "pagar.forma_pago.legend") );
		
		$xtpl->assign( "lbl_efectivo", $this->localize( "forma.pago.efectivo") );
		$xtpl->assign( "lbl_tarjeta", $this->localize( "forma.pago.tarjeta") );
		$xtpl->assign( "lbl_cajaChica", $this->localize( "forma.pago.cajaChica") );
		$xtpl->assign( "lbl_bapro", $this->localize( "forma.pago.bapro") );
		$xtpl->assign( "lbl_anular", $this->localize( "gasto.anular") );
		$xtpl->assign( "lbl_pendiente", $this->localize( "forma.pago.pendiente") );
		
		/*if( ContableUIUtils::isCajaSelected() ){
			$xtpl->assign( "linkPagarEfectivo", $this->getLinkActionPagarGasto($this->getGasto(), ContableUIUtils::getCaja(), $this->getBackTo()) );
			$xtpl->parse("main.forma_pago_caja");	
		}*/
		
		if( ContableUIUtils::isAdminLogged() ){
			/*$xtpl->assign( "linkPagarCajaChica", $this->getLinkActionPagarGasto($this->getGasto(), ContableUtils::getCuentaCajaChica(), $this->getBackTo()) );
			$xtpl->parse("main.forma_pago_cajaChica");*/
			
			$xtpl->assign( "linkPagarBAPRO", $this->getLinkActionPagarGasto($this->getGasto(), ContableUtils::getCuentaBAPROCtaCte(), $this->getBackTo()) );
			$xtpl->assign("lbl_bapro",'Cta. Cte.');
			$xtpl->parse("main.forma_pago_bapro");
			$xtpl->assign( "linkPagarBAPRO", $this->getLinkActionPagarGasto($this->getGasto(), ContableUtils::getCuentaARISTEGUI1(), $this->getBackTo()) );
			$xtpl->assign("lbl_bapro",'Aristegui 1');
			$xtpl->parse("main.forma_pago_bapro");
			$xtpl->assign( "linkPagarBAPRO", $this->getLinkActionPagarGasto($this->getGasto(), ContableUtils::getCuentaBAPROCajaAhorro(), $this->getBackTo()) );
			$xtpl->assign("lbl_bapro",'Caja de Ahorro');
			$xtpl->parse("main.forma_pago_bapro");
			$xtpl->assign( "linkPagarBAPRO", $this->getLinkActionPagarGasto($this->getGasto(), ContableUtils::getCuentaARISTEGUI2(), $this->getBackTo()) );
			$xtpl->assign("lbl_bapro",'Aristegui 2');
			$xtpl->parse("main.forma_pago_bapro");
		}
		
		
		$xtpl->assign( "linkAnular", $this->getLinkGastoAnular($this->getGasto()) );
		
		$backTo = $this->getBackTo();
		if( empty($backTo) ){
			$backTo = "Gastos";
		}
			
		$xtpl->assign( "linkPendiente", LinkBuilder::getPageUrl( $backTo ) );
		$xtpl->parse("main.forma_pago_pendiente");
		
		$msg = $this->getError();
		
		if( !empty($msg) ){
			
			$xtpl->assign("msg", $msg);
			//$xtpl->assign("msg",  );
			$xtpl->parse("main.msg_error" );
		}
	}


	public function getGasto()
	{
	    return $this->gasto;
	}

	public function setGasto($gasto)
	{
	    $this->gasto = $gasto;
	}
	
	public function setGastoOid($gastoOid)
	{
		if(!empty($gastoOid)){
			$gasto = UIServiceFactory::getUIGastoService()->get($gastoOid);
			$this->setGasto($gasto);
		}
		
	    
	}
					
	public function getMsgError(){
		return "";
	}

	public function getError()
	{
	    return $this->error;
	}

	public function setError($error)
	{
	    $this->error = $error;
	}

	public function getBackTo()
	{
	    return $this->backTo;
	}

	public function setBackTo($backTo)
	{
	    $this->backTo = $backTo;
	}
}
?>