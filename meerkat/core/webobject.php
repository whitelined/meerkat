<?php

namespace Meerkat\Core;

/**
 *  WebObject base class.
 *
 *  Base class, that all WebObjects inherit from.
 */
abstract class WebObject
{
	private $routes=[];

	protected function AddRoute($route,$name)
	{
		$this->routes[$route]=$name;
	}
}

?>
