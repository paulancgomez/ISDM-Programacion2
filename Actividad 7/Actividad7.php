<!DOCTYPE html>
<html lang="en">
    <!-- EJERCICIO:
        Confeccionar una clase Tabla que permita indicarle en el método constructor la
        cantidad de filas y columnas. Definir otro método que pueda cargar un dato en una
        determinada fila y columna. Finalmente se debe mostrar los datos en una tabla HTML. -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7</title>
</head>
<body>
    <h1>ACTIVIDAD 7</h1>

    <!-- CODIGO PHP -->
    <?php
        class Tabla {
            
            private $fila;
            private $columna;
            private $matriz = array();
          
            public function __construct($fila, $columna){
                $this->fila = $fila;
                $this->columna = $columna;
            }
          
            //CARGA AUTOMATICA
            public function cargarAutomatico(){
                $valor=1;
                
                for ($i=1; $i<=$this->fila; $i++){
                    for ($j=1; $j<=$this->columna; $j++){
                        $this->tabla[$i][$j]=$valor;
                        $valor++;
                    }
                }
            }

            public function mostrarAutomatico(){
                echo "<table border=1>";
                
                for ($i=1; $i<=$this->fila; $i++){
                    echo "<tr>";
                    for ($j=1; $j<=$this->columna; $j++){
                        echo "<td>"; 
                        echo $this->tabla[$i][$j];
                        echo "</td>";
                    }
                    echo "<br>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            //CARGA DATO POR DATO
            public function cargar($fila, $columna, $valor){
                $this->matriz[$fila][$columna] = $valor;
            }
           
            public function inicioTabla(){
                echo '<table border="1">';
            }
               
            public function inicioFila(){
                echo '<tr>';
            }
           
            public function mostrar($fila, $columna){
                echo '<td>'.$this->matriz[$fila][$columna].'</td>';
            }
           
            public function finFila(){
                echo '</tr>';
            }
           
            public function finTabla(){
                echo '</table>';
            }
          
            public function graficar(){
                $this->inicioTabla();
                for($i=1; $i<=$this->fila; $i++){
                    $this->inicioFila();
                    for($j=1; $j<=$this->columna; $j++){
                        $this->mostrar($i,$j);
                    }
                    $this->finFila();
                }
                $this->finTabla();
            }

        }
        
        //TEST
        echo '<b>CARGANDO AUTOMATICAMENTE</b>';
        $tabla2 = new Tabla(2,3);
        $tabla2->cargarAutomatico();
        $tabla2->mostrarAutomatico();

        echo '<b>CARGANDO DATO POR DATO</b>';
        $tabla1 = new Tabla(2,3);
        $tabla1->cargar(1,1,"1");
        $tabla1->cargar(1,2,"2");
        $tabla1->cargar(1,3,"3");
        $tabla1->cargar(2,1,"4");
        $tabla1->cargar(2,2,"5");
        $tabla1->cargar(2,3,"6");
        $tabla1->graficar();

    ?>
</body>
</html>