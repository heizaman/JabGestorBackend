<?php
	
	include_once 'db_functions.php';
    $db = new DB_Functions();

    $inputJSON = file_get_contents('php://input');
	$data = json_decode($inputJSON, FALSE);

	$username = $data->{"username"};
	$password = $data->{"password"};

	$user = $db->login($username, $password);
	$id = $user["id"];
	$name = $user["name"];

	$arr = array();

	if($user) {
		$arr["status"] = "success";
		$data = array();
		$data["id"] = $id;
		$data["name"] = $name;
		$data["username"] = $username;
		$arr["data"] = $data;
	}
	else
		$arr["status"] = "failed";

	echo json_encode($arr);
	header('Content-Type: application/json');
	return;

?>