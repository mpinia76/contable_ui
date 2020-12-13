<?php
namespace Contable\UI\components\filter\model;


use Contable\UI\components\filter\model\UIContableCriteria;

use Rasty\utils\RastyUtils;
use Contable\Core\criteria\BancoCriteria;

/**
 * Representa un criterio de búsqueda
 * para Banco.
 * 
 * @author Bernardo
 * @since 09-06-2014
 *
 */
class UIBancoCriteria extends UIContableCriteria{


	private $nombre;
	
		
	public function __construct(){

		parent::__construct();

	}
		
	protected function newCoreCriteria(){
		return new BancoCriteria();
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