<?php
/**
 *	Manifest package, for global access to factories, WebObjects, etc.
 *	@package Meerkat
 *	@subpackage Core
 */
namespace Meerkat\Core;

/**
 *  Manifest class for containing factories, WebObjects, and injectables.
 *
 *  The Manifest is a static class that contains factory patterns for objects,
 *  WebObjects, and common objects used for dependency injection.
 */
class Manifest
{
	private static $web_objects=[];
	/**
	 *  Adds WebObject to manifest.
	 *
	 *  Adds WebObject to manifest, as well as define dependencies, and routes
	 *  for object.
	 *
	 *  @param string|array $name Name of WebObject. If name of called object is
	 *  	different to WebObject, array may be passed in format of
	 *  	'CallObject'=>'WebObjectName'.
	 *  @param array|Route $routes Single or Array of Route objects for
	 *  	WebObject.
	 *  @param callable|array $factorymethod string or array of dependencies
	 *  	required.
	 *  @return void
	 */
	public static function AddWebObject($name,$routes,$factorymethod=null)
	{
		if(!is_array($name))
			self::$web_objects[$name]=['target'=>$name,'routes'=>$routes,
				'factory'=>$factorymethod];
		else
			self::$web_objects[key($name)]=['target'=>current($name),
				'routes'=>$routes,'factory'=>$factorymethod];
	}

	/**
	 *  Get named WebObject
	 *
	 *  Returns WebObject if found, false otherwise
	 *
	 *  @param string $name Name of WebObject to find
	 *  @return WebObject|boolean Returns WebObject, or false on failure
	 *  @throws Exception Throws exception if WebObject can't be included, or
	 *  	class doesn't exist.
	 */
	public static function GetWebObject($name)
	{
		if(!isset(self::$web_objects[$name]))
			return false;
		$fn=\Meerkat\Config\local_webojects.mb_strtolower($name).'.php';
		if(!file_exists($fn))
			throw new Exception("Unable to require WebOject $name.");
		require_once($fn);
		if(!class_exists($name))
			throw new Exception("WebObject $name class does not exist.");
		if(self::$web_objects[$name]['factory']!=null)
			return self::$web_objects[$name]['factory']();
		else
			return new $name;
	}
}

?>
