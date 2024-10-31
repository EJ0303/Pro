<?php
require("Fun.php");

$var_conexion = new funcionesPDO();

// Obtener datos del formulario

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Correo = $_POST['Correo'];
$Contra = $_POST['Contra'];
$Telefono = $_POST['Telefono'];


// Insertar personas
try {
if ($var_conexion->insertar_nvapersona($Nombre, $Apellido, $Correo, $Contra, $Telefono )) {
    echo "Usuario registrado correctamente: " . $Nombre;
}
} catch (Exception $e) {
echo "Error al insertar usuario: " . $e->getMessage();
}

}

?>