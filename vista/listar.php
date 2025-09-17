<?php
require_once "controlador/Controlador.php";
$controlador = new Controlador();
$resulado = $controlador->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head><title>Listado de Libros</title></head>
<body>
<h1>Listado de Libros</h1>
<a href="index.php?accion=registrar">Registrar Libro</a>
<table border="1">
<tr><th>ID</th><th>Título</th><th>Autor</th><th>Año</th><th>Acciones</th></tr>    
<?php while($fila = $resultado->fetch_assoc()){ ?>
<tr>
<td><?php echo $fila['id']; ?></td>
<td><?php echo $fila['titulo']; ?></td>
<td><?php echo $fila['autor']; ?></td>
<td><?php echo $fila['anoPublicacion']; ?></td>
<td>
<a href="index.php?accion=editar&id=<?php echo $fila['id']; ?>" >Editar</a>
<a href="index.php?accion=eliminar&id=<?php echo $fila['id']; ?>" >Eliminar</a>
</td>
</tr>
<?php } ?>
</table>  
</body>
</html>
