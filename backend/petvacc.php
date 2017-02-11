<?php
	
	include_once 'db_functions.php';
    $db = new DB_Functions();

    $inputJSON = file_get_contents('php://input');
	$data = json_decode($inputJSON, FALSE);

	$petid = $data->{"petid"};

	$pets = $db->getPetByPetId($petid);
	$pets = mysqli_fetch_array($pets, MYSQLI_ASSOC);
	$dob = $pets["dob"];
	$id = $pets["id"];
	$petname = $pets["petname"];
	$pet = $pets["pet"];

	$year = date('Y', strtotime($dob));
	$month = date('m', strtotime($dob));
	
	$allvaccines = $db->getPetVaccines($pet);

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

	if($pets) {
		$arr["status"] = "success";
		$data = array();
		$data["id"] = $id;
		$data["petid"] = $petid;
		$data["petname"] = $petname;
		$data["pet"] = $pet;
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