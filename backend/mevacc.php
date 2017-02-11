<?php
	
	include_once 'db_functions.php';
    $db = new DB_Functions();

    $inputJSON = file_get_contents('php://input');
	$data = json_decode($inputJSON, FALSE);

	$username = $data->{"username"};

	$user = $db->findUserByUsername($username);

	$user = mysqli_fetch_array($user, MYSQLI_ASSOC);
	$dob = $user["dob"];
	$id = $user["id"];
	$name = $user["name"];
	$sex = $user["sex"];

	$year = date('Y', strtotime($dob));
	$month = date('m', strtotime($dob));
	
	$allvaccines = $db->getUserVaccines($id);

	$vaccines = array();
	while($row = mysqli_fetch_array($allvaccines, MYSQLI_ASSOC)) {
        $months = $row["months"];

        if(($month+$months)>12) {
        	$duemonth = floor(($month+$months)%12);
        	$dueyear = floor($year+(($month+$months)/12));
        }
        else {
        	$duemonth = floor(($month+$months));
        	$dueyear = floor($year);
        }
        
        if($duemonth<10) {
        	$duedate = "2017-0".$duemonth."-01";
        }
        else {
        	$duedate = "2017-".$duemonth."-01";
        }

        $duemonth = date('F', strtotime($duedate));

        $row["duemonth"] = $duemonth;
        $row["dueyear"] = $dueyear;
        $vaccines[] = $row;
    }

	$arr = array();

	if($user) {
		$arr["status"] = "success";
		$data = array();
		$data["id"] = $id;
		$data["name"] = $name;
		$data["username"] = $username;
		$data["sex"] = $sex;
		$data["dob"] = $dob;
		$data["vaccines"] = $vaccines;
		$arr["data"] = $data;
	}
	else
		$arr["status"] = "failed";

	echo json_encode($arr);
	header('Content-Type: application/json');
	return;

?>