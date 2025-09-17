<?php
// Redirección básica según acción
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'listar';
switch($accion){
    case 'registrar':
        require_once 'vista/registrar.php';
        break;
    case 'editar':
        require_once 'vista/editar.php';
        break;
    case 'eliminar':
        require_once 'controlador/Controlador.php';
        $controlador = new Controlador();
        $controlador->eliminar($_GET['id']);
        break;
    default:
        require_once 'vista/listar.php';
        break;
}
?>