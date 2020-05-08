<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	require_once("database/connection.php");
	require_once("safe_json_encode.php");
	
	$name_product = $_POST['name_product'];
	$description = $_POST['description'];
	$image = $_POST['image'];
	$price = $_POST['price'];

    $sql = "INSERT INTO `product` (`name_product`, `description`, `id_category`, `image`, `price`) VALUES ('$name_product', '$description', '1', '$image', '$price');";
	
    $result = mysqli_query($conn, $sql);
	
    if($result){
		$response = array("status" =>1 , "msg" => "cadastrado com sucesso");
		http_response_code(200);
	} else {
		$response = array("status" =>1 , "msg" => "erro ao cadastrar");
		http_response_code(422);
	}

	echo safe_json_encode($response);
	
?>