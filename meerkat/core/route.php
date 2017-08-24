<?php

namespace Meerkat\Core;

/**
 *  Defines route.
 *
 *  Defines routing information, be it specific route or wildcard routes. It
 *  also defines what type of request.
 */
class Route
{
	/** @var string Request Method */
	private $method;
	/** @var string Route */
	private $route;
	/** @var string Function in web object */
	private $handler;
	/** @var string Function in web object used as fallback */
	private $fallback;

	/**
	 *  Route constructor
	 *  @param string $route The name of the route within object. e.g.
	 *  	example.com/Object/Route. Use '*' for any input. Use '/' as
	 *  	default, e.g. example.com/Object
	 *  @param string $handler Specifies function in WebObject to handle
	 *  	request
	 *  @param string $parameters Parameters to be passed to handler.
	 *  @param string $method Specifies request type. Default 'R'. Use 'R' for
	 *  	catch all request, e.g. get/post. 'POST', 'PUT', 'GET', 'DELETE'
	 *  	should be used for respective call methods.
	 *  @param string $fallback Specifies fallback function if method is
	 *  	incorrect.
	 *  @return void
	 */
	public function __construct($route,$handler,$parameters=null,$method="R",
		$fallback=null){
		$this->method=$method;
		$this->route=$route;
		$this->parameters=$parameters;
		$this->handler=$handler;
		$this->fallback=$fallback;
	}

	/**
	 *  Compares route
	 *
	 *  @param string $route Route to compare.
	 *  @return boolean True if matches, false otherwise.
	 */
	public function MatchRoute($route){
		if($this->route==$route)
			return true;
		return false;
	}
	
}

?>
