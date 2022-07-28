<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2 - Ejercicio 3</title>
    <!-- EJERCICIO 3:
            Disponer tres controles de tipo radio que nos permitan seleccionar si la persona: 1-Sin
            estudios, 2-Estudios primarios y 3-Estudios secundarios. En la página que procesa el
            formulario mostrar un mensaje indicando el tipo de estudios que posee.-->
</head>
<body>

    <form method="POST" action="Ejercicio3.php">
        <label>Tu nombre:</label>
            <input type="text" name="nombre"><br>
        <label>Tipo de estudios que posee:</label><br>
        <input type="radio" name="estudios" value="Sin estudios">1. Sin estudios</input><br>
        <input type="radio" name="estudios" value="Estudios primarios">2. Estudios primarios</input><br>
        <input type="radio" name="estudios" value="Estudios secundarios">3. Estudios secundarios</input><br>
        <input type="submit" name="enviar" value="Enviar"><br>
    </form>

    <?php
  
        if(isset($_POST['enviar'])){
            echo $_POST['nombre'].' tiene '.$_POST['estudios'].' <br>';
        }
    
?>
</body>
</html>