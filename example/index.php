<?php

	/**
	 * DocumentRoot : /your/projects/directory/RequestRouter/example/
	 * Example URL : http://localhost/products/details?id=1
	 */

	include(__DIR__."/../RequestRouter.php");
	include(__DIR__."/../AppRequest.php");
	include(__DIR__."/Products.php");

	$response = '';
	try {
		$response = RequestRouter::route(new AppRequest);
	} catch (Exception $e) {
		die("Exception occurred: " . $e->getMessage());
	}

	echo $response;

?>