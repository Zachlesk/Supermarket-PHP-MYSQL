<?php

require_once("../db.php");

class Proveedores{
    
    private $proveedorId;
    private $nombre;
    private $telefono;
    private $ciudad;
    protected $dbCnx;

    public function __construct($proveedorId= 0, $nombre= "", $telefono=0, $ciudad=""){
        $this->proveedorId = $proveedorId;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    
    //Getters
    public function getProveedorId(){
        return $this->proveedorId;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getCiudad(){
        return $this->ciudad;
    }



    //Setters
    public function setProveedorId($proveedorId){
        $this->proveedorId =$proveedorId;
    }

    public function setNombre($nombre){
        $this->nombre =$nombre;
    }

    public function setTelefono($telefono){
        $this->telefono =$telefono;
    }

    public function setCiudad($ciudad){
        $this->ciudad =$ciudad;
    }



    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO proveedores(nombre,telefono,ciudad) 
            VALUES (?,?,?)");
            $stm -> execute ([$this->nombre, $this->telefono, $this->ciudad]);
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM proveedores");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM proveedores WHERE proveedorId = :id");
            $stm->bindParam(":id",$this->proveedorId);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM proveedores WHERE proveedorId = :id");
            $stm->bindParam(":id",$this->proveedorId);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE proveedores SET nombre=:nomb , telefono=:descr , ciudad=:img
            WHERE proveedorId = :id");
            $stm->bindParam(":id",$this->proveedorId);
            $stm->bindParam(":nomb",$this->nombre);
            $stm->bindParam(":descr",$this->telefono);
            $stm->bindParam(":img",$this->ciudad);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
}
?>