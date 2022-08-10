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
        $sql = ("SELECT usuario FROM usuarios WHERE usuario=$this->usuario");
        $resultado = mysqli_query($this->enlace,$sql);

        if ($resultado->num_rows == 1) {
            header("Location: \pobretito\index.php");
            die();
        }else{ 
            include_once("\pobretito\login.php");
            echo '<script language="javascript">alert("USUARIO INGRESADO NO REGISTRADO");</script>';
        } 
        mysqli_free_result($resultado);
        mysqli_close($this->enlace);
    }
}
