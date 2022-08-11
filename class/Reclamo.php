<?php
 include_once("Conexion.php");

 class DatosReclamo extends Conexion{
    public $idUsuario;
    public $provincia;
    public $ciudad;
    public $barrio;
    public $telefono;
    public $descripcion;

    public function __construct($idUsuario, $provincia, $ciudad, $barrio, $telefono, $descripcion)
    {
        $this->idUsuario = $idUsuario;
        $this->provincia = $provincia;
        $this->ciudad = $ciudad;
        $this->barrio = $barrio;
        $this->telefono = $telefono;
        $this->descripcion = $descripcion;
    }

    public function registrarReclamo()
    {
        $this->conectar_DB();
            $query = mysqli_prepare($this->enlace,"INSERT INTO reclamos (idUsuario , Provincia, Ciudad , Barrio, Telefono , Descripcion) VALUES (?,?,?,?,?,?)");
            $query->bind_param("ssssss",$this->idUsuario, $this->provincia, $this->ciudad, $this->barrio, $this->telefono, $this->descripcion);
            $query->execute();

            if ($query->execute()){
                echo '<script>alert("Su reclamo fue registrado")</script>';
            }else{
                echo "<script>alert('ERROR: su reclamo no se registro correctamente')</script>";
            }
    }
 }
