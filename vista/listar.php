<?php
require_once "controlador/Controlador.php";
$controlador = new Controlador();
$resultado = $controlador->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Libros</title>
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
        a {
            text-decoration: none;
            color: #40739e;
            font-weight: bold;
        }
        a:hover {
            color: #e84118;
        }
        .btn-registrar {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background: #44bd32;
            color: white;
            border-radius: 5px;
        }
        .btn-registrar:hover {
            background: #4cd137;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        th {
            background: #273c75;
            color: white;
            padding: 12px;
        }
        td {
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #dcdde1;
        }
        tr:nth-child(even) {
            background: #f1f2f6;
        }
        .acciones a {
            margin: 0 5px;
            padding: 5px 10px;
            border-radius: 4px;
            color: white;
        }
        .editar {
            background: #487eb0;
        }
        .editar:hover {
            background: #40739e;
        }
        .eliminar {
            background: #e84118;
        }
        .eliminar:hover {
            background: #c23616;
        }
        .no-libros {
            text-align: center;
            margin-top: 30px;
            color: #718093;
        }
    </style>
</head>
<body>
    <h1>📚 Listado de Libros</h1>
    <div style="text-align: center;">
        <a class="btn-registrar" href="index.php?accion=registrar">➕ Registrar Libro</a>
    </div>
    <?php if($resultado && $resultado->num_rows > 0){ ?>
        <table>
            <tr>
                <th>ID</th><th>Título</th><th>Autor</th><th>Año</th><th>Acciones</th>
            </tr>
            <?php while($fila = $resultado->fetch_assoc()){ ?>
            <tr>
                <td><?php echo htmlspecialchars($fila['id']); ?></td>
                <td><?php echo htmlspecialchars($fila['titulo']); ?></td>
                <td><?php echo htmlspecialchars($fila['autor']); ?></td>
                <td><?php echo htmlspecialchars($fila['anoPublicacion']); ?></td>
                <td class="acciones">
                    <a class="editar" href="index.php?accion=editar&id=<?php echo $fila['id']; ?>">✏️ Editar</a>
                    <a class="eliminar" href="index.php?accion=eliminar&id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este libro?');">🗑️ Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <h2 class="no-libros">⚠️ No se han registrado libros</h2>
    <?php } ?>
</body>
</html>

