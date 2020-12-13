<?php
namespace Contable\UI\service;

use Contable\UI\components\filter\model\UICuentaCriteria;

use Contable\UI\components\filter\model\UIEmpleadoCriteria;

use Rasty\components\RastyPage;
use Rasty\utils\XTemplate;
use Rasty\i18n\Locale;
use Rasty\exception\RastyException;
use Cose\criteria\impl\Criteria;

use Contable\Core\model\Empleado;
use Contable\Core\model\Cuenta;
use Contable\Core\model\Transferencia;
use Contable\Core\service\ServiceFactory;

use Contable\Core\utils\ContableUtils;

use Cose\Security\model\User;
use Rasty\security\RastySecurityContext;


/**
 * 
 * UI service para cuenta.
 * 
 * @author Bernardo
 * @since 29/05/2014
 */
class UICuentaService {
	
	private static $instance;
	
	private function __construct() {}
	
	public static function getInstance() {
		
		if( self::$instance == null ) {
			
			self::$instance = new UICuentaService();
			
		}
		return self::$instance; 
	}

	
	
	public function getList( UICuentaCriteria $uiCriteria){

		try{

			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			$service = ServiceFactory::getCuentaService();
			
			$contable = $service->getList( $criteria );
	
			return $contable;

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}			
	}
	
	
	public function get( $oid ){

		try {
			
			$service = ServiceFactory::getCuentaService();
			
			return $service->get( $oid );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
		
	public function getMovimientos( Cuenta $cuenta ){

		try {
			
			$service = ServiceFactory::getMovimientoCuentaService();
			
			$movimientos = $service->getMovimientos( $cuenta );

			return $movimientos;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}

	public function getCajaChica(){
		
		try {
			
			return ContableUtils::getCuentaCajaChica();

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}	
		
	}

	public function getCuentaBAPRO(){
		
		try {
			
			return ContableUtils::getCuentaBAPRO();

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}	
		
	}
	
	public function transferir(Cuenta $origen, Cuenta $destino, $monto, $observaciones, $fechaHora ){

		try{
			
			$user = RastySecurityContext::getUser();
			$user = ContableUtils::getUserByUsername($user->getUsername());
			
			$transferencia = new Transferencia();
			$transferencia->setOrigen( $origen );
			$transferencia->setDestino( $destino );
			$transferencia->setMonto( $monto );
			$transferencia->setFechaHora( $fechaHora );
			$transferencia->setObservaciones( $observaciones );
			$transferencia->setUser( $user );
			
			UIServiceFactory::getUITransferenciaService()->add( $transferencia );			
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
		
	}
}
?>