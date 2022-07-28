<?php

/*  EJERCICIO 1:
    Declarar una variable num y asignar un valor aleatorio entre -10 y 10. A continuación, mostrar un
    mensaje indicando si el valor de num es positivo o negativo, si es par o impar, si es múltiplo de 2, si es
    igual a 0 y mostrar su nombre en letras si es mayor que 0 (utilizar switch).*/


//FUNCIONES

function GenerarValor(&$num){
        
    $num = Rand(-10,10);
                
    echo "El numero generado $num ";           
}

function Evaluar($num){

    if ($num > 0) {
        echo "<br> Es Positivo";
        Paridad($num);
        Nombre($num);
    }
    else if ($num < 0){
        echo "<br> Es Negativo";
        Paridad($num);
    }
    else {
        echo "<br> Es Cero";
    }
}

function Paridad($num){

    if ($num % 2 == 0){
        echo "<br> Es Par";
        echo "<br> Es Multiplo de 2";
    }
    else {
        echo "<br> Es Impar";
        echo "<br> NO es Multiplo de 2";
    }
}

function Nombre($num){
    
    echo "<br>";
    
    switch($num){
        
        case 1: echo "Uno";
        break;
        
        case 2: echo "Dos";
        break;
        
        case 3: echo "Tres"; 
        break;
        
        case 4: echo "Cuatro"; 
        break;
        
        case 5: echo "Cinco"; 
        break; 
         
        case 6: echo "Seis"; 
        break;
        
        case 7: echo "Siete"; 
        break;
        
        case 8: echo "Ocho"; 
        break; 
        
        case 9: echo "Nueve";
        break;
        
        case 10: echo "Diez";
        break;
    }
}

//PROGRAMA PRINCIPAL

GenerarValor($num);
Evaluar($num);

?>