<?php

/*  EJERCICIO 3:
    Declarar una variable y asignar un valor, determinar la cantidad de cifras que posee.*/

// FUNCIONES
function generaNumero(&$numero){
    
    $numero = Rand(1,9999999999);
    echo "El numero generado es $numero <br>";

}

function cantidadCifras($numero){

    $cant = 0;
    $aux = $numero;
    
    while ($numero > 0) {
        $numero = intval($numero / 10);
        $cant++;
    }

    echo 'La cantidad que posee el numero ' . $aux . ' es ' . $cant;

}

//PROGRAMA PRINCIPAL
generaNumero($numero);
cantidadCifras($numero);


?>