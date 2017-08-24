<?php

namespace Meerkat\Core;

/**
 *  Main request processor
 *
 *  Processes the inputs, decides where to route requests.
 */
class WebApp{

	/** @var string Request Method */
	private $method;
	/** @var string Request Object*/
	private $robject;
	/** @var string Request Route*/
	private $route;

	/**
	 *  Constructs WebApp and sets up various items.
	 */
	public function __construct(){
		$this->method=$_SERVER['REQUEST_METHOD'];
		if(mb_strlen($_REQUEST[\Meerkat\Config\server_qs_object])<1)
		{
			$this->robject=\Meerkat\Config\server_default_object;
		}
		else
		{
			$req=explode('/',$_REQUEST[\Meerkat\Config\server_qs_object]);
			switch(count($req))
			{
				case 1:
					$this->robject=$req[0];
					$this->route=null;
					break;
				case 2:
					$this->robject=$req[0];
					$this->route=$req[1];
					break;
			}
		}
	}

	/**
	 *
	 */
	public function Run(){
		try{
			$obj=Manifest::GetWebObject($this->robject);
			
		}
		catch(Exception $e){
		}
	}
}

?>
