<?php
require_once "conexion.php";
class Modelo
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }
    public function listar()
    {
        $sql = "SELECT * FROM libros";
        return $this->conexion->query($sql);
    }
    public function registrar($titulo, $autor, $ano, $resumen)
    {
        $sql = "INSERT INTO libros (titulo,autor,anoPublicacion,resumen) VALUES (?,?,?,?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssis", $titulo, $autor, $ano, $resumen);
        return $stmt->execute();
    }
    public function eliminar($id)
    {
        $sql = "DELETE FROM libros WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function actualizar($titulo, $autor, $ano, $resumen, $id)
    {
        $sql = "UPDATE libros SET titulo=?, autor=?, anoPublicacion=?, resumen=? WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssisi", $titulo, $autor, $ano, $resumen, $id);

        return $stmt->execute();
    }
}
