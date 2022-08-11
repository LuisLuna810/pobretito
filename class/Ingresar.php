<?php 
require_once("Conexion.php");


class DatosIngreso extends Conexion{
    public $usuario;
    public $contraseña;

    public function __construct($usuario, $contraseña)
    {
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
    }

    public function ingresar()
    {
        $this->conectar_DB();
        $sql = ("SELECT usuario FROM usuarios WHERE usuario= '$this->usuario' AND contraseña= '$this->contraseña' ");
        $resultado = mysqli_query($this->enlace,$sql);

        if ($resultado->num_rows == 1) {
            header("Location: \pobretito\index.php");
            session_start();
            $_SESSION['usuario']= $this->usuario;
        }else{ 
            echo "<div class='alertas'><h3>El nombre de usuario o contraseña son incorrectos</h3></div>";
        } 
        mysqli_free_result($resultado);
        mysqli_close($this->enlace);
    }
}
