<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2 - Ejercicio 5</title>
    <!-- EJERCICIO 5:
            Confeccionar un formulario que solicite el ingreso de 2 valores enteros y un control select
            (en este último permitir la selección de suma o resta de los valores ingresados). En la página
            que procesa el formulario mostrar un mensaje si es suma o resta con el resultado. -->
</head>
<body>
    <form method="POST" action="Ejercicio5.php">
        <label>Numero 1:</label>
            <input type="number" name="num1" placeholder="Ingrese un numero"><br>
        <label>Numero 2:</label>
            <input type="number" name="num2" placeholder="Ingrese un numero"><br>
        <label>Operacion:</label>
            <select name="operacion">
                <option value="elegir">Seleccione una</option>
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
            </select><br>
        <input type="submit" name="enviar" value="Enviar"><br>
    </form>
    
    <?php
        
        if(isset($_POST['enviar'])){
            echo 'Usted eligió '.$_POST['operacion'].' <br>';
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            switch ($_POST['operacion']) {
                case "suma":
                    echo $num1.' + '.$num2." = ".($num1 + $num2);
                    break;
                case "resta":
                    echo $num1.' - '.$num2." = ".($num1 - $num2);
                    break;
            }
        }
    ?>
</body>
</html>