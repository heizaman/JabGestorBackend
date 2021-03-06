<?php

class DB_Functions {

    private $db;
    private $con;

    function __construct() {
        include_once './db_connect.php';
        require_once './config.php';
        require_once('./JWT.php');
        $this->db = new DB_Connect();
        $this->con = $this->db->connect();
    }


    function __destruct() {
    }


    public function findUserByUsername($username) {
        $username = mysqli_real_escape_string($this->con, $username);
        $result = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$username'");
        return $result;
    }


    public function findUserById($id) {
        $result = mysqli_query($this->con, "SELECT * FROM users WHERE id = $id");
        if(mysqli_num_rows($result) == 0)
            return false;
        $user = mysqli_fetch_array($result);
        return $user;
    }


    public function getChildById($id) {
        $id = mysqli_real_escape_string($this->con, $id);
        $result = mysqli_query($this->con, "SELECT * FROM children WHERE id = '$id'");
        return $result;
    }


    public function getPetById($id) {
        $id = mysqli_real_escape_string($this->con, $id);
        $result = mysqli_query($this->con, "SELECT * FROM pets WHERE id = '$id'");
        return $result;
    }


    public function getChildByChildId($childid) {
        $childid = mysqli_real_escape_string($this->con, $childid);
        $result = mysqli_query($this->con, "SELECT * FROM children WHERE childid = '$childid'");
        return $result;
    }

    public function getPetByPetId($petid) {
        $petid = mysqli_real_escape_string($this->con, $petid);
        $result = mysqli_query($this->con, "SELECT * FROM pets WHERE petid = '$petid'");
        return $result;
    }


    public function getVaccines($childid) {
        $childid = mysqli_real_escape_string($this->con, $childid);
        $result = mysqli_query($this->con, "SELECT * FROM vaccines ORDER BY months ASC");
        return $result;
    }


    public function getUserVaccines($childid) {
        $childid = mysqli_real_escape_string($this->con, $childid);
        $result = mysqli_query($this->con, "SELECT * FROM vaccines WHERE months > '200' ORDER BY months ASC");
        return $result;
    }


    public function getPetVaccines($pet) {
        $pet = mysqli_real_escape_string($this->con, $pet);
        $result = mysqli_query($this->con, "SELECT * FROM petvaccines WHERE pet = '$pet' ORDER BY months ASC");
        return $result;
    }


    public function registerUser($name, $username, $password, $email, $dob, $sex) {
        $userNum = mysqli_num_rows($this->findUserByUsername($username));
        //var_dump($userNum);
        if($userNum > 0) {
            return false;
        }
        
        $name = mysqli_real_escape_string($this->con, $name);
        $username = mysqli_real_escape_string($this->con, $username);
        $password = mysqli_real_escape_string($this->con, $password);
        $email = mysqli_real_escape_string($this->con, $email);
        $dob = mysqli_real_escape_string($this->con, $dob);
        $sex = mysqli_real_escape_string($this->con, $sex);
        $result = mysqli_query($this->con, "INSERT INTO users (id, name, username, password, email, dob, sex) VALUES (DEFAULT, '$name', '$username', '$password', '$email', STR_TO_DATE('$dob', '%d/%m/%Y'), '$sex')");
        return $result;
    }


    public function login($username, $password) {
        $result = $this->findUserByUsername($username);
        $userNum = mysqli_num_rows($result);

        if($userNum == 0) {
            return false;
        }

        $user = mysqli_fetch_array($result);

        if($password != $user["password"]) {
            return false;
        }

        $arr = array();
        $arr["id"] = $user["id"];
        $arr["name"] = $user["name"];

        return $arr;
    }

    public function addChild($childname, $username, $dob, $sex) {
        $result = $this->findUserByUsername($username);
        $userNum = mysqli_num_rows($result);

        if($userNum == 0) {
            return false;
        }

        $user = mysqli_fetch_array($result);

        $id = $user["id"];
        $id = mysqli_real_escape_string($this->con, $id);
        $childname = mysqli_real_escape_string($this->con, $childname);
        $dob = mysqli_real_escape_string($this->con, $dob);
        $sex = mysqli_real_escape_string($this->con, $sex);
        
        $result = mysqli_query($this->con, "INSERT INTO children (childid, id, childname, sex, dob) VALUES (DEFAULT, '$id', '$childname', '$sex', STR_TO_DATE('$dob', '%d/%m/%Y'))");
        return $result;
    }


    public function addPet($petname, $username, $dob, $pet) {
        $result = $this->findUserByUsername($username);
        $userNum = mysqli_num_rows($result);

        if($userNum == 0) {
            return false;
        }

        $user = mysqli_fetch_array($result);

        $id = $user["id"];
        $id = mysqli_real_escape_string($this->con, $id);
        $petname = mysqli_real_escape_string($this->con, $petname);
        $dob = mysqli_real_escape_string($this->con, $dob);
        $pet = mysqli_real_escape_string($this->con, $pet);
        
        $result = mysqli_query($this->con, "INSERT INTO pets (petid, id, petname, pet, dob) VALUES (DEFAULT, '$id', '$petname', '$pet', STR_TO_DATE('$dob', '%d/%m/%Y'))");
        return $result;
    }

}

?>