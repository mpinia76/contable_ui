<?php

namespace Contable\UI\components\filter\movimiento;

use Contable\UI\service\UIServiceFactory;

use Contable\UI\utils\ContableUIUtils;

use Contable\UI\components\grid\model\MovimientoCuentaGridModel;

use Contable\UI\components\filter\model\UIMovimientoCuentaCriteria;

use Contable\UI\components\filter\model\UIMovimientoCriteria;

use Contable\UI\components\grid\model\MovimientoGridModel;

use Rasty\Grid\filter\Filter;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;

/**
 * Filtro para buscar movimientos de caja
 * 
 * @author Bernardo
 * @since 04-06-2014
 */
class MovimientoCajaFilter extends MovimientoFilter{
		
	
	public function getType(){
		
		return "MovimientoCajaFilter";
	}
	
	
	protected function parseXTemplate(XTemplate $xtpl){

		//rellenamos el nombre con el texto inicial
		//$this->fillInput("cuenta", ContableUIUtils::getCaja() );
		
		parent::parseXTemplate($xtpl);
		
		$xtpl->assign("lbl_numero",  $this->localize("caja.numero") );
		$xtpl->assign("lbl_saldo",  $this->localize( "caja.saldo" ) );
		$xtpl->assign("lbl_sucursal",  $this->localize( "caja.sucursal" ) );
		$xtpl->assign("lbl_cajero",  $this->localize( "caja.cajero" ) );
		$xtpl->assign("lbl_saldoInicial",  $this->localize( "caja.saldoInicial" ) );
		$xtpl->assign("lbl_recaudacion",  $this->localize( "caja.recaudacion" ) );
		$xtpl->assign("lbl_horaApertura",  $this->localize( "caja.horaApertura" ) );
		
		$caja = $this->getCuenta();
		$xtpl->assign("sucursal",  $caja->getSucursal() );
		$xtpl->assign("numero",  $caja->getNumero() );
		$xtpl->assign("cajero",  $caja->getCajero() );
		$xtpl->assign("saldo",  ContableUIUtils::formatMontoToView($caja->getSaldo()) );	
		$xtpl->assign("saldoInicial",  ContableUIUtils::formatMontoToView($caja->getSaldoInicial()) );
		$xtpl->assign("recaudacion",  ContableUIUtils::formatMontoToView($caja->getRecaudacion()) );
		$xtpl->assign("horaApertura",  ContableUIUtils::formatTimeToView($caja->getHoraApertura()) );
	}
	
}
?>