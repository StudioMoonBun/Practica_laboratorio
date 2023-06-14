<?php

include("conex_bd.php");
include("validate_form.php");

$mostrarMensaje = false; 

if (isset($_POST['register'])) {
    if (strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['apellido1']) >= 1 &&
        strlen($_POST['apellido2']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['usuario']) >= 1 &&
        strlen($_POST['clave']) >= 1
    ) {
        $nombre = trim($_POST['nombre']);
        $primer_apellido = trim($_POST['apellido1']);
        $segundo_apellido = trim($_POST['apellido2']);
        $email = trim($_POST['email']);
        $usuario = trim($_POST['usuario']);
        $clave = trim($_POST['clave']);
        $clave = hash('sha512', $clave); /*Para encriptar la contraseña en la BBDD*/

        // Verificar si el email ya está registrado
        $consultaEmail = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultadoEmail = mysqli_query($conex, $consultaEmail);

        if (mysqli_num_rows($resultadoEmail) > 0) {
            $mostrarMensaje = true;
            $mensaje = "¡El email está registrado, intente con otro nuevo!";
            echo "<script>document.getElementById('correo').parentNode.classList.add('error');</script>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mostrarMensaje = true;
            $mensaje = "¡Inserte un E-mail válido!";
            echo "<script>document.getElementById('correo').parentNode.classList.add('error');</script>";
        } else {
            $consulta = "INSERT INTO usuarios(nombre, primer_apellido, segundo_apellido, email, usuario, clave) VALUES ('$nombre','$primer_apellido','$segundo_apellido','$email','$usuario','$clave')";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                $mostrarMensaje = true;
                $mensaje = ("¡Te has registrado correctamente!");
                header("Location:form_exito.php");
            } else {
                $mostrarMensaje = true;
                $mensaje = "¡Ha ocurrido un error!";
            }
        }
    } else {
        $mostrarMensaje = true;
        $mensaje = "¡Por favor, complete los campos!";
    }
}

?>

<?php if ($mostrarMensaje) { ?>
    <h3 class="<?php echo $resultado ? 'msg-exito' : 'msg-error'; ?>"><?php echo $mensaje; ?></h3>
<?php } ?>