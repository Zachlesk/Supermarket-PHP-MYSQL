<?php

require_once("../config.php");
require_once("../db.php");
require_once("../login/LoginUser.php");



class RegistroUser extends PDOCnx {
    
    private $id;
    private $empleadoId;
    private $username;
    private $email;
    private $password;

    public function __construct($id=0, $empleadoId=0, $username="", $email="", $password="", $dbCnx="") {
        $this->id = $id;
        $this->empleadoId = $empleadoId;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        parent::__construct($dbCnx);
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getEmpleadoId() {
        return $this->idCamper;
    }
    public function setEmpleadoId($empleadoId) {
        $this->empleadoId = $empleadoId;
    }
    public function getUsername() {
        return $this->username;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }


    public function checkUser($email) {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email = '$email'");
            $stm->execute();
            if($stm->fetchColumn()){
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insertData () {
            try { 
                $stm = $this-> dbCnx -> prepare("INSERT INTO users (empleadoId,username,email,password) VALUES (?,?,?,?)");
                $stm -> execute ([$this->empleadoId, $this->username, $this->email, md5($this->password)]);
                $login = new LoginUser;

                $login-> setEmail($_POST["email"]);
                $login-> setPassword($_POST["password"]);

                $success = $login->login();
    } catch (Exception $e) {
    return $e->getMessage();
    }
  
    }   

}


?>