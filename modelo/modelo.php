<?php
require_once"conexion.php";
class Modelo   {
    private $conexion;
    public function __construct(){
        $this->conexion = Conexion::conectar();
    }
    public function listar(){
        $sql = "SELECT * FROM libros";
        return $this->conexion->query($sql);
    }
    public function registrar($titulo,$autor,$ano){
        $sql = "INSERT INTO libros (titulo,autor,anoPublicacion) VALUES (?,?,?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssi",$titulo,$autor,$ano);
        return $stmt->execute();
    }
    public function eliminar($id){
        $sql = "DELETE FROM libros WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}
?>
