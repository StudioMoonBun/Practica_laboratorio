<?php
if (isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $primer_apellido = $_POST['apellido1'];
    $segundo_apellido = $_POST['apellido2'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Expresión regular para validar letras y acentos
    $patron_letras = '/^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]*$/';
    $patron_usuario = '/^[A-Za-z0-9_]+$/';

    if (empty($nombre)) {
        echo "<script>document.getElementById('nombre').nextElementSibling.innerHTML = 'Inserte su nombre';</script>";
        echo "<script>document.getElementById('nombre').parentNode.classList.add('error');</script>";
    } elseif (!preg_match($patron_letras, $nombre)) {
        echo "<script>document.getElementById('nombre').nextElementSibling.innerHTML = 'Inserte un nombre válido';</script>";
        echo "<script>document.getElementById('nombre').parentNode.classList.add('error');</script>";
    } else {
        echo "<script>document.getElementById('nombre').parentNode.classList.add('success');</script>";
    }

    if (empty($primer_apellido)) {
        echo "<script>document.getElementById('apellido1').nextElementSibling.innerHTML = 'Inserte su primer apellido';</script>";
        echo "<script>document.getElementById('apellido1').parentNode.classList.add('error');</script>";
    } elseif (!preg_match($patron_letras, $primer_apellido)) {
        echo "<script>document.getElementById('apellido1').nextElementSibling.innerHTML = 'Inserte un apellido válido';</script>";
        echo "<script>document.getElementById('apellido1').parentNode.classList.add('error');</script>";
    } else {
        echo "<script>document.getElementById('apellido1').parentNode.classList.add('success');</script>";
    }

    if (empty($segundo_apellido)) {
        echo "<script>document.getElementById('apellido2').nextElementSibling.innerHTML = 'Inserte su segundo apellido';</script>";
        echo "<script>document.getElementById('apellido2').parentNode.classList.add('error');</script>";
    } elseif (!preg_match($patron_letras, $segundo_apellido)) {
        echo "<script>document.getElementById('apellido2').nextElementSibling.innerHTML = 'Inserte un apellido válido';</script>";
        echo "<script>document.getElementById('apellido2').parentNode.classList.add('error');</script>";
    } else {
        echo "<script>document.getElementById('apellido2').parentNode.classList.add('success');</script>";
    }

    if (empty($email)) {
        echo "<script>document.getElementById('correo').nextElementSibling.innerHTML = 'Inserte su E-mail';</script>";
        echo "<script>document.getElementById('correo').parentNode.classList.add('error');</script>";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>document.getElementById('correo').nextElementSibling.innerHTML = 'Inserte un E-mail válido';</script>";
            echo "<script>document.getElementById('correo').parentNode.classList.add('error');</script>";
        } else {
            echo "<script>document.getElementById('correo').parentNode.classList.add('success');</script>";
        }
    }

    if (empty($usuario)) {
        echo "<script>document.getElementById('usuario').nextElementSibling.innerHTML = 'Inserte su usuario';</script>";
        echo "<script>document.getElementById('usuario').parentNode.classList.add('error');</script>";
    } elseif (!preg_match($patron_usuario, $usuario)) {
        echo "<script>document.getElementById('usuario').nextElementSibling.innerHTML = 'Inserte un usuario válido';</script>";
        echo "<script>document.getElementById('usuario').parentNode.classList.add('error');</script>";
    } else {
        echo "<script>document.getElementById('usuario').parentNode.classList.add('success');</script>";
    }

    if (empty($clave)) {
        echo "<script>document.getElementById('clave').nextElementSibling.innerHTML = 'Inserte su clave';</script>";
        echo "<script>document.getElementById('clave').parentNode.classList.add('error');</script>";
    } elseif (strlen($clave) < 4 || strlen($clave) > 8) {
        echo "<script>document.getElementById('clave').nextElementSibling.innerHTML = 'La clave debe tener entre 4 y 8 caracteres';</script>";
    } else {
        echo "<script>document.getElementById('clave').parentNode.classList.add('success');</script>";
    }
}

?>