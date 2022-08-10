<?php 
require_once("Conexion.php");


class DatosRegistro extends Conexion{
    public $usuario;
    public $contraseña;
    public $email;

    public function __construct($usuario, $contraseña, $email)
    {
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->email = $email;
    }

    public function registrarse()
    {
        $this->conectar_DB();
            $query = mysqli_prepare($this->enlace,"INSERT IGNORE INTO usuarios VALUES (?,?,?)");
            $query->bind_param("sss",$this->usuario, $this->contraseña, $this->email);
            $query->execute();

            if ($query->execute()){
                echo "<div class='alertas'><h3>Datos registrado correctamente</h3></div>";
            }else{
                echo "<div class='alertas'><h3>Datos no registrados</h3></div>";
            }

            if(!$query->execute()){
                echo "<h3>DATOS REGISTRADOS CORRECTAMENTE</h3> <br>";
            }else{
                echo "<h3>ERROR: Los datos no se registraron correctamente </h3> <br>";
            }
    }
}
