<?php

namespace Contable\UI\layouts;

use Rasty\Layout\layout\Rasty\Layout;

use Rasty\utils\XTemplate;


class ContableLoginMetroLayout extends ContableMetroLayout{

	public function getXTemplate($file_template=null){
		return parent::getXTemplate( dirname(__DIR__) . "/layouts/ContableLoginMetroLayout.htm" );
	}

	public function getType(){
		
		return "ContableLoginMetroLayout";
		
	}	

}
?>