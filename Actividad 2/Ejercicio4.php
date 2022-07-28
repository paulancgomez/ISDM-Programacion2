<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2 - Ejercicio 4</title>
    <!-- EJERCICIO 4:
            Permitir seleccionar una serie de deportes que practica la persona (futbol, basket, tennis,
            voley). Mostrar en la página que procesa el formulario la cantidad de deportes que practica. -->
</head>
<body>
    
    <h1>Ejercicio 4</h1>
    <h4>Permitir seleccionar una serie de deportes que practica la persona (futbol, basket, tennis,
        voley). Mostrar en la página que procesa el formulario la cantidad de deportes que practica.</h4>
    <hr>

    <form method="POST" action="Ejercicio4.php">
        <label>Tu nombre:</label>
            <input type="text" name="nombre"><br>
        <label>Serie de deportes que practica:</label><br>
            <input type="checkbox" name="deporte[]" value="futbol">Futbol</input>
            <input type="checkbox" name="deporte[]" value="basket">Basket</input>
            <input type="checkbox" name="deporte[]" value="tennis">Tennis</input>
            <input type="checkbox" name="deporte[]" value="voley">Voley</input><br>
            <input type="submit" name="enviar" value="Enviar"><br>
    </form>

    <?php
        if(isset($_POST['enviar'])){
            echo $_POST['nombre'].' practicas '.count($_POST['deporte']).' deporte/s<br>';
        }
    ?>

</body>
</html>