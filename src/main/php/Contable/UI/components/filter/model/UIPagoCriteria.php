<?php
namespace Contable\UI\components\filter\model;


use Contable\UI\utils\ContableUIUtils;
use Contable\Core\utils\ContableUtils;
use Contable\Core\model\EstadoPago;

use Contable\UI\components\filter\model\UIContableCriteria;

use Rasty\utils\RastyUtils;
use Contable\Core\criteria\PagoCriteria;

/**
 * Representa un criterio de búsqueda
 * para Pagos.
 * 
 * @author Bernardo
 * @since 13-06-2014
 *
 */
class UIPagoCriteria extends UIContableCriteria{

	/* constantes para los filtros predefinidos */
	const HOY = "pagosHoy";
	const SEMANA_ACTUAL = "pagosSemanaActual";
	const MES_ACTUAL = "pagosMesActual";
	const ANIO_ACTUAL = "pagosAnioActual";
	const IMPAGAS = "pagosImpagos";
	const ANULADAS = "pagosAnulados";
	
	private $fechaDesde;
	
	private $fechaHasta;
	
	private $fecha;
				
	private $estados;
	
	private $estadoNotEqual;
	
	private $estado;
	
	public function __construct(){

		parent::__construct();
		
		$this->setFiltroPredefinido( self::HOY );

	}
		
	protected function newCoreCriteria(){
		return new PagoCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
		
		$criteria->setFechaDesde( $this->getFechaDesde() );
		$criteria->setFechaHasta( $this->getFechaHasta() );
		$criteria->setFecha( $this->getFecha() );
		$criteria->setEstados( $this->getEstados() );
		$criteria->setEstado( $this->getEstado() );
		
		
		return $criteria;
	}

	
	
	public function getFechaDesde()
	{
	    return $this->fechaDesde;
	}

	public function setFechaDesde($fechaDesde)
	{
	    $this->fechaDesde = $fechaDesde;
	}

	public function getFechaHasta()
	{
	    return $this->fechaHasta;
	}

	public function setFechaHasta($fechaHasta)
	{
	    $this->fechaHasta = $fechaHasta;
	}

	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
	}

	public function getEstados()
	{
	    return $this->estados;
	}

	public function setEstados($estados)
	{
	    $this->estados = $estados;
	}

	public function getEstadoNotEqual()
	{
	    return $this->estadoNotEqual;
	}

	public function setEstadoNotEqual($estadoNotEqual)
	{
	    $this->estadoNotEqual = $estadoNotEqual;
	}

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}
	
	
	public function pagosHoy(){
	
		$this->setFecha( new \Datetime() );

	}
	
	
	public function pagosSemanaActual(){

		$fechaDesde = ContableUtils::getFirstDayOfWeek( new \Datetime() );
		$fechaHasta = ContableUtils::getLastDayOfWeek( new \Datetime());
	
		$this->setFechaDesde( $fechaDesde );
		$this->setFechaHasta( $fechaHasta );
	}
			
	public function pagosMesActual(){

		$fechaDesde = ContableUtils::getFirstDayOfMonth( new \Datetime() );
		$fechaHasta = ContableUtils::getLastDayOfMonth( new \Datetime());
	
		$this->setFechaDesde( $fechaDesde );
		$this->setFechaHasta( $fechaHasta );
			
	}
	
	public function pagosAnioActual(){

		$fechaDesde = ContableUtils::getFirstDayOfYear( new \Datetime() );
		$fechaHasta = ContableUtils::getLastDayOfYear( new \Datetime());
	
		$this->setFechaDesde( $fechaDesde );
		$this->setFechaHasta( $fechaHasta );
	}						
				
	public function pagosImpagos(){

		$this->setEstados( array(EstadoPago::Pendiente) );
			
	}				

	public function pagosAnulados(){

		$this->setEstado( EstadoPago::Anulado );
	}
	
}