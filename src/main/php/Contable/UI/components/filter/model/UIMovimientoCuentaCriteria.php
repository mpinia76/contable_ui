<?php
namespace Contable\UI\components\filter\model;


use Contable\UI\components\filter\model\UIContableCriteria;

use Rasty\utils\RastyUtils;
use Contable\Core\criteria\MovimientoCuentaCriteria;

/**
 * Representa un criterio de búsqueda
 * para movimientos de cuenta.
 * 
 * @author Bernardo
 * @since 28/05/2014
 *
 */
class UIMovimientoCuentaCriteria extends UIContableCriteria{


	private $fecha;
	
	private $fechaDesde;
	
	private $fechaHasta;
	
	private $cuenta;
		
	public function __construct(){

		parent::__construct();

	}
		
	protected function newCoreCriteria(){
		return new MovimientoCuentaCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
				
		$criteria->setFecha( $this->getFecha() );
		$criteria->setFechaDesde( $this->getFechaDesde() );
		$criteria->setFechaHasta( $this->getFechaHasta() );
		$criteria->setCuenta( $this->getCuenta() );
		
		return $criteria;
	}


	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
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

	public function getCuenta()
	{
	    return $this->cuenta;
	}

	public function setCuenta($cuenta)
	{
	    $this->cuenta = $cuenta;
	}
}