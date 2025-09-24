<?php
class Conexion {
    public static function conectar(){
        $host = "localhost";
        $usuario = "root";
        $clave = "root";
        $bd = "db_libros";
        $conexion = new mysqli($host, $usuario, $clave, $bd);
        if($conexion->connect_error){
            die("Error de conexión: " . $conexion->connect_error);
        }
        return $conexion;
    }
}
?>