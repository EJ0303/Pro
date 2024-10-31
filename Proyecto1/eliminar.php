<?php
require("Fun.php");

$var_conexion = new funcionesPDO();

// Obtener datos del formulario

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$id_medicamento = $_POST['id_medicamento'];


// Insertar personas
try {
if ($var_conexion->eliminar_medicina($id_medicamento )) {
    echo "medicamento eliminado: " . $id_medicamento;
}
} catch (Exception $e) {
echo "Error al eliminar medicamento: " . $e->getMessage();
}

}

?>