<?php
require("Fun.php");

$var_conexion = new funcionesPDO();

// Obtener datos del formulario

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    
    
    // Insertar nuevo libro
    try {
    if ($var_conexion->actualizar_precio($nombre, $precio )) {
        echo "Precio actualizado: " . $precio;
    }
    } catch (Exception $e) {
    echo "Error al actualizar: " . $e->getMessage();
    }
}
?>
