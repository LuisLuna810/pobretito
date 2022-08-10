<?php

class Conexion{

    public $enlace;

    function conectar_DB(){
        $server = "localhost";
        $user = "root";
        $passw = "";
        $db = "pobretito";

        $this->enlace = mysqli_connect($server,$user,$passw,$db);

        if(!$this->enlace){
            echo "NO SE LOGRO LA CONEXION CON LA BDD<br>";
        }
    }
}
?>