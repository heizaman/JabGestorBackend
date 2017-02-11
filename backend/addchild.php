<?php
	
	include_once 'db_functions.php';
    $db = new DB_Functions();

    $inputJSON = file_get_contents('php://input');
	$data = json_decode($inputJSON, FALSE);

	$arr = array();

	$childname = trim($data->{"childname"});
	$username = trim($data->{"username"});
	$dob = trim($data->{"dob"});
	$sex = trim($data->{"sex"});

	if($childname == "" || $username == "" || $dob == "" || $sex == "") {
		$arr["status"] = "failed";
		echo json_encode($arr);
		header('Content-Type: application/json');
		return;
	}

	$add = $db->addChild($childname, $username, $dob, $sex);

	if($add)
		$arr["status"] = "success";
	else
		$arr["status"] = "failed";

	echo json_encode($arr);
	header('Content-Type: application/json');
	return;

?>