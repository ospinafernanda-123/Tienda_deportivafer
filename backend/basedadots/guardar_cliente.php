<?php

include "conexion.php";

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$tipo_documento = $_POST["tipo_documento"];
$numero_documento = $_POST["numero_documento"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo_electronico"];
$contrasena = $_POST["contrasena"];
$confirmar = $_POST["confirmar_contrasena"];

// Comprobar contraseñas
if ($contrasena !== $confirmar) {
    die("Las contraseñas no coinciden.");
}

// Encriptar contraseña
$contrasena_segura = password_hash(
    $contrasena,
    PASSWORD_DEFAULT
);

// Insertar cliente
$sql = "INSERT INTO clientes
(Nombre, Apellido, Tipo_documento, Numero_documento, Dirección, Telefono, Correo_electronico, Contraseña)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . $conexion->error);
}

$stmt->bind_param(
    "ssssssss",
    $nombre,
    $apellido,
    $tipo_documento,
    $numero_documento,
    $direccion,
    $telefono,
    $correo,
    $contrasena_segura
);

if ($stmt->execute()) {

    echo "<h1>Registro exitoso</h1>";
    echo "<p>El cliente fue guardado correctamente.</p>";
   echo '<a href="../../frontend/pages/login.html">Ir al Login</a>';

} else {

    echo "Error al registrar: " . $stmt->error;

}

$stmt->close();
$conexion->close();

?>