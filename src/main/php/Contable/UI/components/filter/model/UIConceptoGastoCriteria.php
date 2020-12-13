<?php
namespace Contable\UI\components\filter\model;


use Contable\UI\components\filter\model\UIContableCriteria;

use Rasty\utils\RastyUtils;
use Contable\Core\criteria\ConceptoGastoCriteria;

/**
 * Representa un criterio de búsqueda
 * para Conceptos de gastos.
 * 
 * @author Bernardo
 * @since 29/05/2014
 *
 */
class UIConceptoGastoCriteria extends UIContableCriteria{

	private $nombre;
		
	public function __construct(){

		parent::__construct();

	}
		
	protected function newCoreCriteria(){
		return new ConceptoGastoCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
				
		$criteria->setNombre( $this->getNombre() );
		
		return $criteria;
	}



	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}
}