<?php
	
	include_once 'db_functions.php';
    $db = new DB_Functions();

    $inputJSON = file_get_contents('php://input');
	$data = json_decode($inputJSON, FALSE);

	$arr = array();

	$name = trim($data->{"name"});
	$username = trim($data->{"username"});
	$password = trim($data->{"password"});
	$email = trim($data->{"email"});
	$dob = trim($data->{"dob"});
	$sex = trim($data->{"sex"});

	if($name == "" || $username == "" || $password == "" || $email == "" || $dob == "" || $sex == "") {
		$arr["status"] = "failed";
		echo json_encode($arr);
		header('Content-Type: application/json');
		return;
	}

	$register = $db->registerUser($name, $username, $password, $email, $dob, $sex);

	if($register)
		$arr["status"] = "success";
	elseif($register == false)
		$arr["status"] = "alreadyexists";
	else
		$arr["status"] = "failed";

	echo json_encode($arr);
	header('Content-Type: application/json');
	return;

?>