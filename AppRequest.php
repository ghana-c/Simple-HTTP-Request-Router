<?php
/**
 * This class is use for track the url content
 */
class AppRequest {

	/**
	 * Class name
	 *
	 * @var string
	 */
	private $_class;

	/**
	 * Method name
	 *
	 * @var string
	 */
	private $_func;

	/**
	 * Request type (GET, POST, PUT, DELETE)
	 *
	 * @var string
	 */
	private $_request_type;

	/**
	 * Class constructor
	 */
	public function __construct() {
		$url = $_SERVER['REQUEST_URI'];
		$this->_request_type = $_SERVER['REQUEST_METHOD'];

		$request = explode('?',$url);

		$parts = explode('/', $request[0]);
		$parts = array_filter($parts);

		/* Set class name variable */
		$this->_class = ($c = array_shift($parts))? ucfirst($c) : '';

		/* Set function name variable */
		$this->_func = ($c = array_shift($parts))? $c : '';
	}

	/**
	 * This method is used to get class name from URL
	 *
	 * @return string Class name
	 */
	public function getClassName() {
		return $this->_class;
	}

	/**
	 * This method is used to get method name from URL
	 *
	 * @return string Method name
	 */
	public function getMethodName() {
		return $this->_func;
	}

	/**
	 * This method is used to get request type from URL
	 *
	 * @return string Request type
	 */
	public function getRequestType() {
		return $this->_request_type;
	}

	/**
	 * This method is used to get request data from request body
	 *
	 * @return array Request data
	 */
	public function getRequestParam() {
		switch (strtoupper($this->_request_type)) {
			case 'GET': {
				$output = $_GET;
				break;
			}
			case 'PUT':
			case 'DELETE': {
				parse_str(file_get_contents("php://input"), $output);
				break;
			}
			case 'POST': {
				$output = $_POST;
				if(isset($_POST['data']) && !empty($_POST['data'])) {
					$input_vars = stripcslashes($_POST['data']);
					$output = json_decode($input_vars, true);
				}
				break;
			}
			default: {
				$output = [];
				break;
			}
		}
		return $output;
	}
}