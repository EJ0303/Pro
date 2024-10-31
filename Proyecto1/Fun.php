<?php
include_once("conexion.php");

class funcionesPDO {

    private $db;

    function __construct() {
        $this->db = new conexion();
    }

    // Método para obtener la conexión
    public function obtenerConexion() {
        return $this->db->conectar();
    }


    // Insertar nueva persona
    function insertar_nvapersona($Nombre, $Apellido, $Correo, $Contra, $Telefono) {
        $conexion = $this->db->conectar();
        if ($conexion) {
            // Hashear la contraseña antes de insertarla en la base de datos
            
            $query = "INSERT INTO tb_login(Nombre, Apellido, Correo, Contra, Telefono)
                      VALUES(:Nombre, :Apellido, :Correo, :Contra, :Telefono)";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':Nombre', $Nombre, PDO::PARAM_STR);
            $stmt->bindParam(':Apellido', $Apellido, PDO::PARAM_STR);
            $stmt->bindParam(':Correo', $Correo, PDO::PARAM_STR);
            $stmt->bindParam(':Contra', $Contra, PDO::PARAM_STR);  // Contraseña hasheada
            $stmt->bindParam(':Telefono', $Telefono, PDO::PARAM_STR);
            return $stmt->execute();
        }
        return false;
    }

     // Actualizar préstamo
     function actualizar_precio($nombre, $precio) {
        $conexion = $this->db->conectar();
        if ($conexion) {
            $query = "UPDATE Medicamentos SET precio = :precio WHERE nombre = :nombre";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_INT);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            
            return $stmt->execute();
        }
        return false;
    }

    // Eliminar medicina
    function eliminar_medicina($id_medicamento) {
        $conexion = $this->db->conectar();
        if ($conexion) {
            $query = "DELETE FROM Medicamentos WHERE id_medicamento = :id_medicamento";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':id_medicamento', $id_medicamento, PDO::PARAM_INT);
            return $stmt->execute();
        }
        return false;
    }

}
?>