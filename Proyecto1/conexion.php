<?php
class conexion {
    private $conexion;
    private $bd;
    private $Dirservidor;
    private $Usuario;
    private $Clave;

    // Constructor que inicializa variables
    function __construct() {
        $this->bd = "biblioteca";
        $this->Dirservidor = "localhost";
        $this->Usuario = "root";
        $this->Clave = "";
    }

    // Conectar a la base de datos usando PDO
    function conectar() {
        try {
            $this->conexion = new PDO("mysql:host=$this->Dirservidor;dbname=$this->bd", $this->Usuario, $this->Clave);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            echo "<font color='red'>(!) Error de Conexión: " . $e->getMessage() . " (!)</font>";
            return false;
        }
    }
}
?>
