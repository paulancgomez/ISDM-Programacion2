<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2 - Ejercicio 1</title>
    <!-- EJERCICIO 1:
            Confeccionar un formulario que solicite la carga de un nombre y apellido de persona.
            Mostrarlo en la página que procese el formulario.-->
</head>
<body>
    <form method= "POST" action="Ejercicio1.php">
            <label>Nombre: <label>
                <input type="text" name="nombre"><br><br>
            <label>Apellido: <label>
                <input type="text" name="apellido"><br><br>
            <input type="submit" name="mostrar" value="Mostrar">
    </form>
    <?php

        if (isset($_POST['mostrar'])){
        
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
        
            echo "<br><br>" . $nombre . $apellido;
        }

    ?>
</body>
</html>