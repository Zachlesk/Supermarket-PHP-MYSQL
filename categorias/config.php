<?php


require_once("../config.php");

class Categorias extends PDOCnx{
    
    private $categoriaId;
    private $nombres;
    private $descripcion;
    private $imagen;
    

    public function __construct($categoriaId= 0, $nombres= "", $descripcion="", $imagen=""){
        $this->categoriaId = $categoriaId;
        $this->nombres = $nombres;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        parent::__construct();
        
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
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM categorias");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM categorias WHERE categoriaId = ?");
            $stm -> execute([$this->categoriaId]);
            return $stm -> fetchAll();
            echo "<script> alert('Categoria eliminada');document.location='categorias.php'</script>'";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM categorias WHERE categoriaId = ?");
            $stm -> execute([$this->categoriaId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE categorias SET nombres= ? , descripcion= ? , imagen= ? WHERE categoriaId = ?");
            $stm -> execute([$this->nombres, $this->descripcion, $this->imagen, $this->categoriaId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>


