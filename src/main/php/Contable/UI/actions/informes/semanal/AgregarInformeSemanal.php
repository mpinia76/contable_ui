<?php
namespace Contable\UI\actions\informes\semanal;


use Contable\UI\components\form\informeSemanal\InformeSemanalForm;

use Contable\UI\service\UIServiceFactory;
use Contable\Core\model\InformeSemanal;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;

use Contable\Core\utils\ContableUtils;
use Cose\Security\model\User;


/**
 * se realiza el alta de un InformeSemanal.
 * 
 * @author Bernardo
 * @since 14/04/2015
 */
class AgregarInformeSemanal extends Action{

	
	public function execute(){

		$forward = new Forward();

		$page = PageFactory::build("InformeSemanalAgregar");
		
		$informeSemanalForm = $page->getComponentById("informeSemanalForm");
		
		try {

			//creamos un nuevo informeSemanal.
			$informeSemanal = new InformeSemanal();
			
			//completados con los datos del formulario.
			$informeSemanalForm->fillEntity($informeSemanal);
			
			$user = RastySecurityContext::getUser();
			$user = ContableUtils::getUserByUsername($user->getUsername());
			
			$informeSemanal->setUser( $user );
			
			//agregamos el informeSemanal.
			UIServiceFactory::getUIInformeSemanalService()->add( $informeSemanal );
			
			$forward->setPageName( $informeSemanalForm->getBackToOnSuccess() );
			$forward->addParam( "informeSemanalOid", $informeSemanal->getOid() );			
		
			$informeSemanalForm->cleanSavedProperties();
			
		
		} catch (RastyException $e) {
		
			$forward->setPageName( "InformeSemanalAgregar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			
			//guardamos lo ingresado en el form.
			$informeSemanalForm->save();
		}
		
		return $forward;
		
	}

}
?>