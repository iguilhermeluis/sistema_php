<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	require_once("database/connection.php");
	require_once("safe_json_encode.php");

    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
	
    while ( $dados = mysqli_fetch_assoc($result) ) 
    {  
		$response[] = array(
			"image" => $dados['image'],
			"name_product" => $dados['name_product'],
			"description" => $dados['description'],
			"price" => $dados['price']
		);
		http_response_code(200);
	}

	$json = $response;

	echo safe_json_encode($response);
	
?>