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
            $stm = $this-> dbCnx -> prepare("INSERT INTO categorias (nombres,descripcion,imagen) 
            VALUES (?,?,?)");
            $stm -> execute ([$this->nombres, $this->descripcion, $this->imagen]);
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function obtainAll(){
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
            $stm = $this-> dbCnx -> prepare("DELETE FROM categorias WHERE categoriaId = ?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
            echo "<script> alert('Registro eliminado');document.location='estudiantes.php'</script>'";
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM categorias WHERE categoriaId = ?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE categorias SET nombres= ? , descripcion= ? , imagen= ? WHERE categoriaId = ?");
            $stm -> execute([$this->nombres, $this->direccion, $this->logros, $this->id]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessages();
        }
    }
}
?>


