<?php
namespace Contable\UI\components\filter\model;


use Contable\UI\components\filter\model\UIContableCriteria;

use Rasty\utils\RastyUtils;
use Contable\Core\criteria\InformeSemanalCriteria;

/**
 * Representa un criterio de búsqueda
 * para informes semanales.
 * 
 * @author Bernardo
 * @since 14/04/2015
 *
 */
class UIInformeSemanalCriteria extends UIContableCriteria{

	private $mes;
		
	public function __construct(){

		parent::__construct();

	}
		
	protected function newCoreCriteria(){
		return new InformeSemanalCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
				
		$criteria->setMes( $this->getMes() );
		
		return $criteria;
	}



	public function getMes()
	{
	    return $this->mes;
	}

	public function setMes($mes)
	{
	    $this->mes = $mes;
	}
}