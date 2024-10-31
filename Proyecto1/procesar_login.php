<?php
require("Fun.php");

$var_conexion = new funcionesPDO();

// Obtener datos del formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreUsuario = $_POST['nombreUsuario'];
    $Contra = $_POST['Contra'];

    // Consulta para verificar si el usuario existe con los datos proporcionados
    $conexion = $var_conexion->obtenerConexion(); // Usamos el nuevo método para obtener la conexión
    if ($conexion) {
        $query = "SELECT * FROM tb_login WHERE Correo = :nombreUsuario AND Contra = :Contra";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':nombreUsuario', $nombreUsuario, PDO::PARAM_STR);
        $stmt->bindParam(':Contra', $Contra, PDO::PARAM_STR);  // Contraseña sin encriptar

        $stmt->execute();

        // Si encuentra el usuario, le permite el acceso
        if ($stmt->rowCount() > 0) {
            header('Location: web.html');
            // Aquí puedes redirigir al usuario a la página principal
            // header("Location: pagina_principal.php");
            exit();
        } else {
            echo "Error: Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Error al conectar con la base de datos.";
    }
}
?>
