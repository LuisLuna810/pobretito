<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="login-page">
        <div class="form">
            <form class="login-form" method="POST">
                <input type="text" placeholder="Usuario" />
                <input type="password" placeholder="Contraseña" />
                <button>Ingresar</button>
                <p class="message">No esta registrado? <a href="\pobretito\registro.php">Crear una cuenta</a></p>
            </form>
            <?php 
            require_once("class/Ingresar.php");
            if (isset($_POST["submit"])) {
                $usuario= $_POST['usuario'];
                $contraseña= $_POST['contraseña'];
                $login = new DatosIngreso($usuario,$contraseña);
                $login->ingresar();
            }
            ?>
            
        </div>
    </div>
</body>
</html>