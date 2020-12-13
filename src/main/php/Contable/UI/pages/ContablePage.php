<?php
namespace Contable\UI\pages;

use Contable\UI\utils\ContableUIUtils;

use Contable\Core\model\Caja;
use Contable\Core\model\Venta;
use Contable\Core\model\Cuenta;
use Contable\Core\model\Gasto;

use Contable\Core\model\Pago;

use Rasty\components\RastyPage;
use Rasty\utils\LinkBuilder;

/**
 * página genérica para la app de contable
 * 
 * @author Bernardo
 * @since 25/05/2014
 */
abstract class ContablePage extends RastyPage{


	
	public function getTitle(){
		return $this->localize( "contable_app.title" );
	}

	public function getMenuGroups(){

		return array();
	}

	public function getLinkContable(){
		
		return LinkBuilder::getPageUrl( "Contable") ;
		
	}
	
	public function getLinkActionAbrirCaja(){
		
		return LinkBuilder::getActionUrl( "AbrirCaja") ;
		
	}

	public function getLinkCerrarCaja( Caja $caja ){
		
		$link = LinkBuilder::getPageUrl( "CerrarCaja", array("cajaOid"=>$caja->getOid())) ;
		
		return $link;
	}
	
	public function getLinkActionCerrarCaja(){
		
		return LinkBuilder::getActionUrl( "CerrarCaja") ;
		
	}

	public function getLinkActionSeleccionarCaja(){
		
		return LinkBuilder::getActionUrl( "SeleccionarCaja") ;
		
	}
	
	public function getLinkCajaHome(){
		
		return LinkBuilder::getPageUrl( "AdminHome") ;
		
	}
	
	
	
	public function getLinkGastos(){
		
		return LinkBuilder::getPageUrl( "Gastos") ;
		
	}
	
	public function getLinkGastoAgregar($backTo = "GastoPagar"){
		
		
		
		return LinkBuilder::getPageUrl( "GastoAgregar", array("backTo" => $backTo )) ;
		
	}
	
	public function getLinkActionAgregarGasto(){
		
		return LinkBuilder::getActionUrl( "AgregarGasto") ;
		
	}
	
	public function getLinkActionPagarGasto(Gasto $gasto, Cuenta $cuenta, $backTo ="CajaHome"){
		
		return LinkBuilder::getActionUrl( "PagarGasto", array("gastoOid"=>$gasto->getOid(),
																"cuentaOid"=>$cuenta->getOid(),
																"backTo" => $backTo)) ;
		
	}
	
	public function getLinkGastoAnular(Gasto $gasto){
		
		return LinkBuilder::getPageUrl( "GastoAnular", array("gastoOid"=>$gasto->getOid())) ;
		
	}
	
	public function getLinkActionAnularGasto(Gasto $gasto){
		
		return LinkBuilder::getActionUrl( "AnularGasto", array("gastoOid"=>$gasto->getOid())) ;
		
	}
	
	
	
	public function getLinkRetirarEfectivo(){
		
		return LinkBuilder::getPageUrl( "RetirarEfectivo") ;
		
	}
	
	public function getLinkActionRetirarEfectivo(){
		
		return LinkBuilder::getActionUrl( "RetirarEfectivo") ;
		
	}
	
	public function getLinkActionIngresarEfectivo(){
		
		return LinkBuilder::getActionUrl( "IngresarEfectivo") ;
		
	}
	
	public function getLinkMovimientosCajaActual(){
		
		return LinkBuilder::getPageUrl( "MovimientosCajaActual") ;
		
	}


	public function getLinkRendirCaja( Caja $caja = null ){
		
		if($caja==null)
			$caja = ContableUIUtils::getCaja();
		
		return LinkBuilder::getPageUrl( "RendirCaja", array("cajaOid"=>$caja->getOid())) ;
		
	}
	
	public function getLinkMovimientosCajaChica(){
		
		return LinkBuilder::getPageUrl( "MovimientosCajaChica") ;
		
	}
	
	public function getLinkMovimientosBanco(){
		
		return LinkBuilder::getPageUrl( "MovimientosBanco") ;
		
	}
	
	
	public function getLinkAdminHome(){
		
		return LinkBuilder::getPageUrl( "AdminHome") ;
		
	}
	
	public function getLinkActionDepositarEfectivo(){
		
		return LinkBuilder::getActionUrl( "DepositarEfectivo") ;
		
	}
	
	public function getLinkActionTransferir(){
		
		return LinkBuilder::getActionUrl( "Transferir") ;
		
	}
	
	
	
	public function getLinkBancos(){
		
		return LinkBuilder::getPageUrl( "MovimientosBanco") ;
		
	}
	
	
	
	public function getLinkBalanceDia(){
		
		return LinkBuilder::getPageUrl( "BalanceDia") ;
		
	}
	
	public function getLinkBalanceCaja(){
		
		return LinkBuilder::getPageUrl( "BalanceCaja") ;
		
	}
	
	public function getLinkBalanceMes(){
		
		return LinkBuilder::getPageUrl( "BalanceMes") ;
		
	}
	
	public function getLinkBalanceAnio(){
		
		return LinkBuilder::getPageUrl( "BalanceAnio") ;
		
	}
	
	public function getLinkInformesSemanales(){
		
		return LinkBuilder::getPageUrl( "InformesSemanales") ;
		
	}
	
	public function getLinkActionAgregarInformeSemanal(){
		
		return LinkBuilder::getActionUrl( "AgregarInformeSemanal") ;
		
	}
	
	public function getLinkActionModificarInformeSemanal(){
		
		return LinkBuilder::getActionUrl( "ModificarInformeSemanal") ;
		
	}
	
	
	
	public function getLinkActionAnularPago(Pago $pago){
		
		return LinkBuilder::getActionUrl( "AnularPago", array("pagoOid"=>$pago->getOid())) ;
		
	}
	
public function getLinkConceptoGastos(){
		
		return LinkBuilder::getPageUrl( "ConceptoGastos") ;
		
	}

	public function getLinkConceptoGastoAgregar(){
		
		return LinkBuilder::getPageUrl( "ConceptoGastoAgregar") ;
		
	}
	
	public function getLinkActionAgregarConceptoGasto(){
		
		return LinkBuilder::getActionUrl( "AgregarConceptoGasto") ;
		
	}

	public function getLinkActionModificarConceptoGasto(){
		
		return LinkBuilder::getActionUrl( "ModificarConceptoGasto") ;
		
	}
	
	
	
	
}
?>