<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2 - Ejercicio 6</title>
    <!-- EJERCICIO 6:
            Confeccionar un formulario que solicite el ingreso del currículo de una persona en un
            textarea y un control select (en este último permitir la selección de los ingresos mensuales
            de la persona: 1-10000,10001-30000,>30000). En la página que procesa el formulario
            mostrar un mensaje si debe pagar impuestos a las ganancias (si supera 30000). -->
</head>
<body>
    <form action="Ejercicio6.php" method="post">
        <label>Curriculum:</label>
            <textarea name="curriculo" id="" cols="30" rows="10" placeholder="Escriba su curriculum"></textarea><br>    
        <label>Ingresos mensuales:</label><br>
            <select name="operacion" id="operacion">
                <option value="0">Seleccione una</option>
                <option value="1">1-10000</option>
                <option value="2">10001-30000</option>
                <option value="3">Mayor a 30000</option>
        </select>
        <button type="submit" name="enviar" value="Enviar">Enviar</button>
    </form>

    <?php
        if(isset($_POST['enviar'])){
            if ($_POST['operacion'] == 3) {
                echo "Debe pagar impuestos a las ganancias.";
            } else {
                echo "No debe pagar impuestos a las ganancias.";
            }
        }
    ?>
</body>
</html>