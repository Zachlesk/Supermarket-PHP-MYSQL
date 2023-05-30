<?php

require_once("../db.php");
require_once("../config.php");

class Productos extends PDOCnx{
    
    private $productoId;
    private $categoriasId;
    private $precioUnitario;
    private $stock;
    private $unidadesPedidas;
    private $proveedorId;
    private $nombreProducto;
    private $descontinuado;
    

    public function __construct($productoId=0, $categoriasId= 0, $precioUnitario= 0, $stock=0, $unidadesPedidas=0 , $proveedorId=0, $nombreProducto="", $descontinuado=""){
        $this->productoId = $productoId;
        $this->categoriasId = $categoriasId;
        $this->precioUnitario = $precioUnitario;
        $this->stock = $stock;
        $this->unidadesPedidas = $unidadesPedidas;
        $this->proveedorId = $proveedorId;
        $this->nombreProducto = $nombreProducto;
        $this->descontinuado = $descontinuado;
        parent::__construct();
    
    }
    
    //Getters
    public function getProductoId(){
        return $this->productoId;
    }

    public function getCategoriasId(){
        return $this->categoriasId;
    }

    public function getPrecioUnitario(){
        return $this->precioUnitario;
    }

    public function getStock(){
        return $this->stock;
    }

    public function getUnidadesPedidas(){
        return $this->unidadesPedidas;
    }

    public function getProveedorId(){
        return $this->proveedorId;
    }

    public function getNombreProducto(){
        return $this->nombreProducto;
    }

    public function getDescontinuado(){
        return $this->descontinuado;
    }

    //Setters
    public function setProductoId($productoId){
        $this->productoId =$productoId;
    }

    public function setCategoriasId($categoriasId){
        $this->categoriasId =$categoriasId;
    }

    public function setPrecioUnitario($precioUnitario){
        $this->precioUnitario =$precioUnitario;
    }

    public function setStock($stock){
        $this->stock =$stock;
    }

    public function setUnidadesPedidas($unidadesPedidas){
        $this->unidadesPedidas =$unidadesPedidas;
    }

    public function setProveedorId($proveedorId){
        $this->proveedorId =$proveedorId;
    }

    public function setNombreProducto($nombreProducto){
        $this->nombreProducto =$nombreProducto;
    }
    public function setDescontinuado($descontinuado){
        $this->descontinuado =$descontinuado;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO productos(categoriasId,precioUnitario,stock,unidadesPedidas,proveedorId,nombreProducto,descontinuado) VALUES (?,?,?,?,?,?,?)");
            $stm->execute([$this->categoriasId, $this->precioUnitario, $this->stock, $this->unidadesPedidas, $this->proveedorId, $this->nombreProducto, $this->descontinuado]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM productos");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM productos WHERE productoId = ?");
            $stm-> execute([$this->productoId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM productos WHERE productoId = ?");
            $stm -> execute([$this->productoId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE productos SET categoriasId= ? , precioUnitario= ?, stock= ?, unidadesPedidas= ?, proveedorId = ?, nombreProducto = ?, descontinuado = ? WHERE productoId = ?");
            $stm->execute([$this->categoriasId, $this->precioUnitario, $this->stock, $this->unidadesPedidas, $this->proveedorId, $this->nombreProducto, $this->descontinuado]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

public function obtenerCategoriasId(){
    try {
        $stm = $this-> dbCnx -> prepare("SELECT categoriaId,nombres FROM categorias");
        $stm -> execute();
        return $stm -> fetchAll();
    } catch (Exception $e) {
        return $e->getMessages();
    }
}

public function obtenerProveedorId(){
    try {
        $stm = $this-> dbCnx -> prepare("SELECT proveedorId,nombre FROM proveedores");
        $stm -> execute();
        return $stm -> fetchAll();
    } catch (Exception $e) {
        return $e->getMessages();
    }
}
}


?>