<?php

require_once("../config.php");

class Empleados extends PDOCnx{
    
    private $empleadoId;
    private $nombre;
    private $celular;
    private $direccion;
    private $imagen;
    

    public function __construct($empleadoId= 0, $nombre= "", $celular=0, $direccion="",$imagen=""){
        $this->empleadoId = $empleadoId;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->direccion = $direccion;
        $this->imagen = $imagen;
        parent::__construct();
    }
    
    //Getters
    public function getEmpleadoId(){
        return $this->empleadoId;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getImagen(){
        return $this->imagen;
    }

    //Setters
    public function setEmpleadoId($empleadoId){
        $this->empleadoId =$empleadoId;
    }

    public function setNombre($nombre){
        $this->nombre =$nombre;
    }

    public function setCelular($celular){
        $this->celular =$celular;
    }

    public function setDireccion($direccion){
        $this->direccion =$direccion;
    }

    public function setImagen($imagen){
        $this->imagen =$imagen;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO empleados(nombre,celular,direccion,imagen) 
            VALUES (?,?,?,?)");
            $stm->execute([$this->nombre, $this->celular, $this->direccion, $this->imagen]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM empleados WHERE empleadoId = ?");
            $stm-> execute([$this->empleadoId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM empleados WHERE empleadoId = ?");
            $stm -> execute([$this->empleadoId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE empleados SET nombre= ? , celular= ? , direccion= ?
            WHERE empleadoId = ?");
            $stm -> execute([$this->nombre, $this->celular, $this->direccion, $this->empleadoId]);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>