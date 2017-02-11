<?php
	
	include_once 'db_functions.php';
    $db = new DB_Functions();

    $inputJSON = file_get_contents('php://input');
	$data = json_decode($inputJSON, FALSE);

	$childid = $data->{"childid"};

	$child = $db->getChildByChildId($childid);
	$child = mysqli_fetch_array($child, MYSQLI_ASSOC);
	$dob = $child["dob"];
	$id = $child["id"];
	$childname = $child["childname"];
	$sex = $child["sex"];

	$year = date('Y', strtotime($dob));
	$month = date('F', strtotime($dob));
	
	$allvaccines = $db->getVaccines($childid);

	$vaccines = array();
	while($row = mysqli_fetch_array($allvaccines, MYSQLI_ASSOC)) {
        $months = $row["months"];

        if(($month+$months)>12) {
        	$duemonth = floor(($month+$months)/12);
        	$dueyear = floor($year+(($month+$months)%12));
        }
        else {
        	$duemonth = floor(($month+$months));
        	$dueyear = floor($year+(($month+$months)));
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

	if($child) {
		$arr["status"] = "success";
		$data = array();
		$data["id"] = $id;
		$data["childid"] = $childid;
		$data["childname"] = $childname;
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