
<?php
// Conectar a la base de datos 
$server= "localhost";
$user = "root";
$pass= "";
$db= "tphotel";

$conexion = new mysqli($server, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener habitaciones disponibles
$query = "SELECT * FROM habitaciones";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitaciones Disponibles</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Habitaciones Disponibles</h1>
    <div class="habitaciones">
        <?php 
        while ($habitacion = $resultado->fetch_assoc()) { 
        ?>
            <div class="habitacion">
                <h2><?php echo $habitacion['nombre']; ?></h2>
                <p><?php echo $habitacion['descripcion']; ?></p>
                <img src="<?php echo $habitacion['imagen']; ?>" alt="<?php echo $habitacion['nombre']; ?>">
                <p>Precio por noche: $<?php echo $habitacion['precio']; ?></p>
                <a href="verMas.php?id=<?php echo $habitacion['id']; ?>">Ver más</a>
            </div>
        <?php 
        } 
        ?>
    </div>
</body>
</html>

<?php
$conexion->close();
?>
