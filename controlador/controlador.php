<?php
require_once "modelo/Modelo.php";
class Controlador {
    private $modelo;
    public function __construct(){
        $this->modelo = new Modelo();
    }
    public function listar(){
        return $this->modelo->listar();
    }
    public function registrar($titulo,$autor,$ano){
        return $this->modelo->registrar($titulo,$autor,$ano);
    }
    public function eliminar($id){
        return $this->modelo->eliminar($id);
    }
}
?>