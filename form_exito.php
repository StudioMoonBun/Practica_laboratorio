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
    <link rel="icon" type="image/x-icon" href="images/astronaut_icon.png">

    <!--LINKS PARA LA FUENTE POPPINS-->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <!--LINK PARA EL STYLE DE CSS-->
    <link rel="stylesheet" href="CSS/form_exito_styles.css">
</head>

<body>
    <div class="container">
        <div class="botones_container">
            <!--BOTON MOSTRAR USUARIOS-->
            <div class="exito_form">
                <h3>Bienvenido, ¡Te has registrado correctamente!</h3>
                <form method="POST">
                    <button id="boton_mostrar_usuarios" class="boton_usuarios" name="boton_mostrar_usuarios">Mostrar Usuarios</button>
                </form>
                <button class="boton_usuarios"><a href="index.php">Volver al formulario</a></button>
            </div>
        </div>
    </div>

    <?php
    
    $conex = mysqli_connect("localhost", "root", "", "practica_laboratorio_3");

    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    if (isset($_POST["boton_mostrar_usuarios"])) {
        $sql = "SELECT * FROM usuarios";
        $result = $conex->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Primer Apellido</th>";
            echo "<th>Segundo Apellido</th>";
            echo "<th>Email</th>";
            echo "<th>Usuario</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . (isset($row['nombre']) ? $row['nombre'] : '') . "</td>";
                echo "<td>" . (isset($row['primer_apellido']) ? $row['primer_apellido'] : '') . "</td>";
                echo "<td>" . (isset($row['segundo_apellido']) ? $row['segundo_apellido'] : '') . "</td>";
                echo "<td>" . (isset($row['email']) ? $row['email'] : '') . "</td>";
                echo "<td>" . (isset($row['usuario']) ? $row['usuario'] : '') . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron usuarios registrados.";
        }
    }
    $conex->close();
    ?>
</body>

</html>