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

// Obtener detalles de la habitación
$habitacion_id = $_GET['id'];
$query = "SELECT * FROM habitaciones WHERE id = $habitacion_id";
$resultado = $conexion->query($query);
$habitacion = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Habitación</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1><?php echo $habitacion['nombre']; ?></h1>
    <div class="habitacion-detalle">
        <img src="<?php echo $habitacion['imagen']; ?>" alt="<?php echo $habitacion['nombre']; ?>">
        <p><?php echo $habitacion['descripcion']; ?></p>
        <p>Precio por noche: $<?php echo $habitacion['precio']; ?></p>
        <a href="reserva.php?habitacion_id=<?php echo $habitacion['id']; ?>">Reservar</a> 
    </div>
</body>
</html>

<?php
$conexion->close();
?>
