<?php
require_once "controlador/Controlador.php";
$controlador = new Controlador();

// Si se envió el formulario de edición
if ($_POST) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    $conexion = Conexion::conectar();
    $sql = "UPDATE libros SET titulo=?, autor=?, anoPublicacion=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssii", $titulo, $autor, $ano, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

// Obtener datos del libro a editar
$id = $_GET['id'];
$conexion = Conexion::conectar();
$sql = "SELECT * FROM libros WHERE id=?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$libro = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        h1 { color: #333; text-align: center; }
        form { background: #fff; padding: 20px; border-radius: 8px; max-width: 400px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label { font-weight: bold; }
        input[type=text], input[type=number] {
            width: 100%; padding: 10px; margin: 8px 0;
            border: 1px solid #ccc; border-radius: 5px;
        }
        input[type=submit] {
            background: #28a745; color: #fff; border: none;
            padding: 10px 15px; border-radius: 5px;
            cursor: pointer; width: 100%;
        }
        input[type=submit]:hover { background: #218838; }
        a {
            display: block; margin-top: 15px;
            color: #007bff; text-decoration: none; text-align: center;
        }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Editar Libro</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $libro['id']; ?>">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $libro['titulo']; ?>" required>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="<?php echo $libro['autor']; ?>" required>

        <label for="ano">Año de Publicación:</label>
        <input type="number" id="ano" name="ano" value="<?php echo $libro['anoPublicacion']; ?>" required>

        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="index.php">Volver al listado</a>
</body>
</html>
