<?php

require_once("../db.php");

class Facturas {
    
    private $facturaId;
    private $empleadoId;
    private $clienteId;
    private $fecha;
    protected $dbCnx;

    public function __construct($facturaId=0,$empleadoId= 0, $clienteId= 0, $fecha=0){
        $this->facturaId = $facturaId;
        $this->empleadoId = $empleadoId;
        $this->clienteId = $clienteId;
        $this->fecha = $fecha;
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    
    //Getters
    public function getFacturaId(){
        return $this->facturaId;
    }

    public function getEmpleadoId(){
        return $this->empleadoId;
    }

    public function getClienteId(){
        return $this->clienteId;
    }

    public function getFecha(){
        return $this->fecha;
    }

    //Setters
    public function setFacturaId($facturaId){
        $this->facturaId =$facturaId;
    }

    public function setEmpleadoId($empleadoId){
        $this->empleadoId =$empleadoId;
    }

    public function setClienteId($clienteId){
        $this->clienteId =$clienteId;
    }

    public function setFecha($fecha){
        $this->fecha =$fecha;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO facturas(empleadoId,clienteId,fecha) 
            VALUES (?,?,?)");
            $stm->execute([$this->empleadoId, $this->clienteId, $this->fecha]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM facturas");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM facturas WHERE facturaId = ?");
            $stm-> execute([$this->facturaId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM facturas WHERE facturaId = ?");
            $stm -> execute([$this->facturaId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE facturas SET empleadoId= ? , clienteId= ?, fecha= ?
            WHERE facturaId = ?");
            $stm -> execute([$this->empleadoId, $this->clienteId, $this->fecha, $this->facturaId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>