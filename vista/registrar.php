<?php
require_once "controlador/Controlador.php";

if ($_POST) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $resumen = $_POST['resumen'];


    $controlador = new Controlador();
    $controlador->registrar($titulo, $autor, $ano,$resumen);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Libro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #2f3640;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #273c75;
        }
        .form-container {
            width: 400px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
            color: #40739e;
        }
        input[type="text"], input[type="number"], textarea {
            width: 95%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #dcdde1;
            border-radius: 5px;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 15px;
            background: #44bd32;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background: #4cd137;
        }
        .btn-volver {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background: #487eb0;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-volver:hover {
            background: #40739e;
        }
    </style>
</head>
<body>
    <h1>➕ Registrar Nuevo Libro</h1>
    <div class="form-container">
        <form method="POST">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor" required>

            <label for="ano">Año de Publicación</label>
            <input type="number" id="ano" name="ano" required>

            <label for="resumen">Resumen</label>
            <textarea id="resumen" name="resumen" rows="4" required></textarea>

            <input type="submit" value="Guardar 📖">
        </form>
        <div style="text-align: center;">
            <a class="btn-volver" href="index.php">⬅️ Volver al Listado</a>
        </div>
    </div>
</body>
</html>
