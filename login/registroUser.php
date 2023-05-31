<?php

require_once("../config.php");
require_once("../db.php");




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

public function insertData () {
            try { 
                $stm = $this-> dbCnx -> prepare("INSERT INTO users (empleadoId,username,email,password) VALUES (?,?,?,?)");
                $stm -> execute ([$this->empleadoId, $this->username, $this->email, md5($this->password)]);
    } catch (Exception $e) {
    return $e->getMessage();
    }
  
    }   

    public function obtainAll() {
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM users");
            $stm -> execute();
            return $stm -> fetchAll();

        } catch (Exception $e) {
            return e->getMessage();
        }
    }

    public function delete() {
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM users WHERE id=?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne() {
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM users WHERE id=?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
            
        } catch (Exception $e) {
            return 
            $e->getMessage();
        }
    }

    public function update() {

        try {
            $stm = $this->dbCnx -> prepare("UPDATE users SET empleadoId = ?, username = ?, email = ?, password = ? WHERE id=?");
            $stm -> execute([$this->empleadoId, $this->username, $this->email, $this->id]);

        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
}





?>