<?php

/*  EJERCICIO 6:
    Declarar una variable que sea un array de al menos 10 valores. Devolver un array ordenado de mayor
    a menor, si uno o más valores se repiten eliminarlos del array de salida.*/

    //FUNCIONES
    
    function generaTamanio(&$tam){
        
        $tam = Rand(1,5);
        echo "Tamanio = $tam<br>";
    
    }
    
    function generaCargaArray(&$array, $tam){
    
        for($i=0; $i<$tam; $i++){
            $array[$i] = Rand(1,10);
        }
    
    }

    function muestraArray($array){
        echo "<br>ARRAY<br>";
        for($i=0; $i<sizeof($array); $i++){
            echo $array[$i] . " // ";
        }
        echo "<br>";
    }

    function eliminaRepetidos(&$array, &$tam){
        $cont = 0;
        $n = sizeof($array);

        for ($i=0 ; $i<$n-1 ; $i++){
            if ($array[$i] == $array[$i+1]){
                for ($j=$i ; $j<$n ; $j++){
                        
                    $array[$j] = $array[$j+1];

                }
                $cont++;
            }
        }
        $tam = $tam - $cont;
    }


    function ordenaDesc($array){

        $n = sizeof($array);

        for ($i=0 ; $i<$n-1 ; $i++){
        
            for ($j=$i+1 ; $j<$n ; $j++){

                if ($array[$i] < $array[$j]){
                            
                    $aux = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $aux;
                }
            }
        }
    }


    //TEST
    
    generaTamanio($tam);
    generaCargaArray($array, $tam);
    muestraArray($array);
    

    echo "<br>VECTOR SIN ELEMENTOS REPETIDOS";
    //eliminaRepetidos($array, $tam);
    $array = array_unique($array);
    muestraArray($array);


    echo "<br>VECTOR ORDENADO DE MAYOR A MENOR";
    //ordenaDesc($array);
    rsort($array);
    muestraArray($array);



?>