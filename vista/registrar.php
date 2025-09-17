<?php
require_once "controlador/Controlador.php";
if($_POST) 
{
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $controlador = new controlador() ;
    $controlador->registrar( $titulo, $autor, $ano);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head><title>Registrar Libro</title></head>
    <body>
        <h1>Registrar Libro</h1>
        <form method="POST">
            Titulo: <input type="text" name="titulo" required><br>
            Autor:<input type="text" name="autor" required><br>
            Año: <input type="number" name="ano" required><br>
            <input type="submit" value="Guardar">
        </form>
    </body>
</html>