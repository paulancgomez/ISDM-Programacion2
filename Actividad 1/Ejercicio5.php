<?php

/*  EJERCICIO 5:
    Mostrar la tabla de multiplicar del 2 utilizando ciclos for, while y do while*/

    //TEST
    echo ("Tabla de multiplicar del 2");
    
    echo ("<br>Con ciclo FOR");
    for ($i=1 ; $i<=10 ; $i++){
        echo "<br>" . $i . " x 2 = " . $i*2;
    }
    
    echo ("<br>Con ciclo WHILE");
    $i=1;
    while ($i<=10){
        
        echo "<br>" . $i . " x 2 = " . $i*2;
        $i++;
    
    } 
    
    echo ("<br>Con ciclo DO WHILE");
    $i=1;
    do{
    
        echo "<br>" . $i . " x 2 = " . $i*2;
        $i++;
    
    }while($i<=10);

?>