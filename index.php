<?php
    require_once("class\Ingresar.php");
    session_start();
    $varSession = $_SESSION['usuario'];
    if ($varSession == null || $varSession = '') {
    echo "ACCESO DENEGADO";
    die();
}   
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Formularios</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container-reclamos">
		<h1 class="text-center">Generar Reclamo</h1>
		<form class="col-sm-6 col-sm-offset-3" method="POST">
			<div class="form-group">
				<label>Provincia *</label>
				<input type="text" name="provincia" class="form-control" placeholder="Ej. Santa Fe">
			</div>
			<div class="form-group">
				<label>Ciudad *</label>
				<input type="text" name="ciudad" class="form-control" placeholder="Ej. Cordoba">
			</div>
			<div class="form-group">
				<label>Barrio *</label>
				<input type="text" name="barrio" class="form-control" placeholder="Ej. Nueva Cba.">
			</div>
			<div class="form-group">
				<label>Telefono *</label>
				<input type="text" name="telefono" class="form-control" placeholder="Ej. 3576467966">
			</div>
			<div class="form-group">
				<label>Descripcion *</label>
				<p><textarea class="form-control" name="descripcion" rows="3" maxlength="150"></textarea></p>
			</div>
            <div class="form-group btn btn-outline-danger col-sm-offset-3">
            <input name="registrarReclamo" style="background-color: orange; color:white; border-color:gray;" type="submit" class="btn btn-secondary col-sm-7" value="Registrar Reclamo">
            <input name="cerrarSession" style="background-color: red; color:white; border-color:gray;" type="submit" class="btn btn-outline-danger col-sm-offset-4" value="Cerrar Sesion">
			</div>
		</form>
        <?php
        if (isset($_POST["registrarReclamo"]))
        	{
            require_once("class/Reclamo.php");
            $idUsuario = $_SESSION["usuario"];
            $provincia = $_POST["provincia"];
            $ciudad = $_POST["ciudad"];
            $barrio = $_POST["barrio"];
            $telefono = $_POST["telefono"];
            $descripcion = $_POST["descripcion"];
            $reclamo = new DatosReclamo($idUsuario,$provincia,$ciudad,$barrio,$telefono,$descripcion);
			$reclamo->registrarReclamo();
        	}else
			{
			if (isset($_POST["cerrarSession"]))
        	{
            header("Location: cerrarSession.php");
        	}
			}
        ?>
		<p>&nbsp;</p>

	</div>
</body>
</html>