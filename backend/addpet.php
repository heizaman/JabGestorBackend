<?php
	
	include_once 'db_functions.php';
    $db = new DB_Functions();

    $inputJSON = file_get_contents('php://input');
	$data = json_decode($inputJSON, FALSE);

	$arr = array();

	$petname = trim($data->{"petname"});
	$username = trim($data->{"username"});
	$dob = trim($data->{"dob"});
	$pet = trim($data->{"pet"});

	if($petname == "" || $username == "" || $dob == "" || $pet == "") {
		$arr["status"] = "failed";
		echo json_encode($arr);
		header('Content-Type: application/json');
		return;
	}

	$add = $db->addPet($petname, $username, $dob, $pet);

	if($add)
		$arr["status"] = "success";
	else
		$arr["status"] = "failed";

	echo json_encode($arr);
	header('Content-Type: application/json');
	return;

?>