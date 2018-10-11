<?php

class Products {

	protected $_request;

	public function __construct($request) {
		if(isset($request['url_path']))
			unset($request['url_path']);
		$this->_request = $request;
	}

	public function details() {
		$result = "You are in Products > details with request: ".json_encode($this->_request);
		return $result;
	}
}

?>