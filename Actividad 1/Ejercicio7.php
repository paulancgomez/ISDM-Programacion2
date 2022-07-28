<?php

/*  EJERCICIO 7:
    Llenar dos vectores A y B de 45 elementos cada uno, sumar el elemento uno del vector A con el
    elemento del vector B y así sucesivamente hasta 45, almacenar el resultado en un vector C, e imprimir
    el vector resultante.*/

    //FUNCIONES
    function cargaVector(&$vector, $n){
        
        for ($i=0 ; $i<$n ; $i++){
                $vector[$i] = Rand(20,50);
        }
   
    }


    function muestraVector($vector, $n){
        
        echo"<br>";
        for ($i=0 ; $i<$n ; $i++){
        
            echo $vector[$i] . " // ";
        
        }

    }


    function sumaVectores(&$C, $A, $B){
        
        for ($i=0; $i<45; $i++ ){
            
            $C[$i] = $A[$i] + $A[$i];
    
        }
    }



//PROGRAMA PRINCIPAL
$n = 45;
cargaVector($A, $n); 
echo "Vector A";   
muestraVector($A, $n);    

cargaVector($B, $n);
echo "<br><br>Vector B";    
muestraVector($B, $n); 

sumaVectores($C, $A, $B, $n);
echo "<br><br>Suma de ambos vectores";
muestraVector($C, $n);


?>