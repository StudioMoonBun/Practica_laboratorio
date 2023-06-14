<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Ana Belén Tierraseca Gómez">
    <meta name="description" content="Practica Laboratorio">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Título-->
    <title>Práctica Laboratorio 3 | Samsung Desarrolladoras 2022 </title>

    <!--Icono-->
    <link rel="icon" type="image/x-icon" href="CSS/astronaut.png">

    <!--LINKS PARA LA FUENTE POPPINS-->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <!--LINK PARA EL STYLE DE CSS-->
    <link rel="stylesheet" href="CSS/styles.css">

</head>

<body>
    <div class="container">
        <form method="POST" id="formulario" class="formulario">
            <h1>FORMULARIO WEB</h1>

            <!--CAMPO NOMBRE-->
            <div class="input-control">
                <label for="nombre">Nombre</label>
                <input id="nombre" name="nombre" type="text" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>">
                <div class="error" id="error-nombre"></div>
            </div>

            <!--CAMPO PRIMER APELLIDO-->
            <div class="input-control">
                <label for="apellido1">Primer Apellido</label>
                <input id="apellido1" name="apellido1" type="text" value="<?php echo isset($_POST['apellido1']) ? $_POST['apellido1'] : ''; ?>">
                <div class="error" id="error-apellido1"></div>
            </div>

            <!--CAMPO SEGUNDO APELLIDO-->
            <div class="input-control">
                <label for="apellido2">Segundo Apellido</label>
                <input id="apellido2" name="apellido2" type="text" value="<?php echo isset($_POST['apellido2']) ? $_POST['apellido2'] : ''; ?>">
                <div class="error" id="error-apellido2"></div>
            </div>

            <!--CAMPO EMAIL-->
            <div class="input-control">
                <label for="correo">Email</label>
                <input id="correo" name="email" type="text" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                <div class="error" id="error-email"></div>
            </div>

            <!--USERNAME-->
            <div class="input-control">
                <label for="usuario">Usuario</label>
                <input id="usuario" name="usuario" type="text" oninput="checkEmail()" value="<?php echo isset($_POST['usuario']) ? $_POST['usuario'] : ''; ?>">
                <div class="error" id="error-usuario"></div>
            </div>

            <!--CAMPO CLAVE-->
            <div class="input-control">
                <label for="clave">Contraseña</label>
                <input id="clave" name="clave" type="password" pattern=".{4,8}" title="La contraseña debe tener entre 4 y 8 caracteres" value="<?php echo isset($_POST['clave']) ? $_POST['clave'] : ''; ?>">
                <div class="error" id="error-clave"></div>
            </div>

            <!--BOTON ENVIAR-->
            <button type="submit" id="enviando" name="register">Enviar</button>
            <span class="msg-error" id="msg-error" name=""></span> 
        </form>

    </div>
    
    <!--LINK ARCHIVO JAVASCRIPT-->
    <script src="./scripts/index.js"></script>

    <?php
    include("registrar.php");
    include("validate_form.php");
    ?>

</body>

</html>

