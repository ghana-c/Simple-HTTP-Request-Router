<?php
/**
 * This class is used to route request call to given class -> method and get response
 */
class RequestRouter {

	/**
	 * Class instances array
	 *
	 * @var array 
	 */
	private static $_instances = [];

  /**
   * This method is used to route request call to given class -> method
   *
   * @param object 	$request 	Object of class AppRequest
   *
   * @return Response
   */
	public static function route(AppRequest $request) {
		$class_name = $request->getClassName();
		$method_name = $request->getMethodName();
		$request_type = $request->getRequestType();

		$request_params = $request->getRequestParam();

		/* Get instance of class */
		$class_obj = self::getInstance($class_name, [$request_params]);

		/* Call method in class */
		$response = $class_obj->$method_name();
		if(!empty($response)) {
			return $response;
		}
	}

  /**
   * This method is used to get object of this singleton class
   *
   * @param string 	$class 	Class name requested in URL
   * @param array 	$args 	Request data
   *
   * @return Instance of called class
   */
  private static function getInstance($class, $args = []) {
  	if(!class_exists($class)) {
  		throw new Exception("Class file for `".$class."` not found");
  	}
    if (!isset(self::$_instances[$class])) {
      self::$_instances[$class] = new $class(...$args);
    }
    return self::$_instances[$class];
  }
}