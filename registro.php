<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="login-page">
        <div class="form">
            <form class="register-form" method="POST">
                <input type="text" name="usuario"  placeholder="Usuario"  required/>
                <input type="password" name="contraseña"  placeholder="Contraseña" required/>
                <input type="email"  name="email" placeholder="Email" required/>
                <button type="submit" name="submit">Registrarse</button>
                <p class="message">Ya esta registrado? <a href="login.php">Ingresar</a></p>
            </form>
            <?php 
            require_once("class/Registrar.php");
            if (isset($_POST["submit"])) {
                $usuario= $_POST['usuario'];
                $contraseña= $_POST['contraseña'];
                $email= $_POST['email'];
                $register = new DatosRegistro($usuario,$contraseña,$email);
                $register->registrarse();
            }
            ?>
</body>
</html>