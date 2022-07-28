<?php

/*  EJERCICIO 2:
    Declarar y asignar 3 variables Hora, Minuto, Segundo que contienen hora, minutos y segundos,
    respectivamente, y comprueba si la hora que indican es una hora válida.*/

    //FUNCIONES
    function generaHora(&$Hora, &$Minuto, &$Segundo){

        $Hora = Rand(0,99);
        $Minuto = Rand(0,99);
        $Segundo = Rand(0,99);

        echo "La hora generada es $Hora : $Minuto : $Segundo ";
    
    }


    function CompruebaHora($Hora, $Minuto, $Segundo){

        if ($Hora > 23) {
            echo "<br>Hora NO valida";    
        }
        if ($Minuto > 59){
            echo "<br>Minutos NO valida";
        }
        if ($Segundo > 59){
            echo "<br>Segundos NO valida";
        }
    
    }


    //TEST
    generaHora($Hora, $Minuto, $Segundo);
    CompruebaHora($Hora, $Minuto, $Segundo);
    

?>