<?php

require_once("../db.php");


class Categorias {
    
    private $categoriaId;
    private $nombres;
    private $descripcion;
    private $imagen;
    protected $dbCnx;

    public function __construct($categoriaId= 0, $nombres= "", $descripcion="", $imagen=""){
        $this->categoriaId = $categoriaId;
        $this->nombres = $nombres;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        
    }
    
    //Getters
    public function getCategoriaId(){
        return $this->categoriaId;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getImagen(){
        return $this->imagen;
    }

    //Setters
    public function setCategoriaId($categoriaId){
        $this->categoriaId =$categoriaId;
    }

    public function setNombres($nombres){
        $this->nombres =$nombres;
    }

    public function setDescripcion($descripcion){
        $this->descripcion =$descripcion;
    }

    public function setImagen($imagen){
        $this->imagen =$imagen;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO categorias(nombres,descripcion,imagen) 
            VALUES (:nomb,:descr,:img)");
            $stm->bindParam(":nomb",$this->nombres);
            $stm->bindParam(":descr",$this->descripcion);
            $stm->bindParam(":img",$this->imagen);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function getAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM categorias");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM categorias WHERE categoriaId = :id");
            $stm->bindParam(":id",$this->categoriaId);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM categorias WHERE categoriaId = :id");
            $stm->bindParam(":id",$this->categoriaId);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE categorias SET nombres=:nomb , descripcion=:descr , imagen=:img
            WHERE categoriaId = :id");
            $stm->bindParam(":id",$this->categoriaId);
            $stm->bindParam(":nomb",$this->nombres);
            $stm->bindParam(":descr",$this->descripcion);
            $stm->bindParam(":img",$this->imagen);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
}
?>


