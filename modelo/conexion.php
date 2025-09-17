<?php
class Conexion {
    public static function conectar(){
        $shot ="localhost";
        $usuario = "root";
        $clave = "";
        $bd = "db_libros";
        $conexion= new mysqli($shot,$usuario;$clave,$bd);
        if($conexion->connect_error){
            die("Error de conexión: " . $conexion->connect_error);
        }
        return $conexion;
    }
}
?>    