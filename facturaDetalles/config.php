<?php

require_once("../config.php");

class FacturasDetalle extends PDOCnx{
    
    private $facturaId;
    private $productoId;
    private $cantidad;
    private $precioVenta;
    

    public function __construct($facturaId=0,$productoId= 0, $cantidad= 0, $precioVenta=0){
        $this->facturaId = $facturaId;
        $this->productoId = $productoId;
        $this->cantidad = $cantidad;
        $this->precioVenta = $precioVenta;
        parent::__construct();
    }
    
    //Getters
    public function getFacturaId(){
        return $this->facturaId;
    }

    public function getProductoId(){
        return $this->productoId;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function getPrecioVenta(){
        return $this->precioVenta;
    }

    //Setters
    public function setFacturaId($facturaId){
        $this->facturaId =$facturaId;
    }

    public function setProductoId($productoId){
        $this->productoId =$productoId;
    }

    public function setCantidad($cantidad){
        $this->cantidad =$cantidad;
    }

    public function setPrecioVenta($precioVenta){
        $this->precioVenta =$precioVenta;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO facturaDetalle(productoId,cantidad,precioVenta) 
            VALUES (?,?,?)");
            $stm->execute([$this->productoId, $this->cantidad, $this->precioVenta]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM facturaDetalle");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
  
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM facturaDetalle WHERE facturaId = ?");
            $stm -> execute([$this->facturaId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE facturaDetalle SET productoId= ?, cantidad= ?, precioVenta = ?
            WHERE facturaId = ?");
            $stm -> execute([$this->facturaId, $this->productoId, $this->cantidad, $this->precioVenta]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

public function obtenerFacturaId(){
    try {
        $stm = $this-> dbCnx -> prepare("SELECT facturaId FROM facturas");
        $stm -> execute();
        return $stm -> fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

public function obtenerProductoId(){
    try {
        $stm = $this-> dbCnx -> prepare("SELECT productoId,nombreProducto FROM productos");
        $stm -> execute();
        return $stm -> fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
}


?>