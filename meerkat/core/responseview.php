<?php

namespace Meerkat\Core;

class ResponseView extends Response{
	private $name;
	private $parameters;

	public function __construct($name,$parameters){
		$this->name=$name;
		$this->parameters=$parameters;
	}

	public function EchoData(){

	}


	public function BufferData(){

	}
}

?>
