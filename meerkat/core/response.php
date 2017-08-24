<?php

namespace Meerkat\Core;

abstract class Response
{
	public function SetMimeType($type){
		\header("Content-type: $type");
	}

	abstract public function EchoData();
	abstract public function BufferData();
}

?>
