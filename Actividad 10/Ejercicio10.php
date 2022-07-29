<!DOCTYPE html>
<html lang="en">

<!-- EJERCICIO:
        Una página web es común que contenga una cabecera, un cuerpo y un pie
        de página. Secciones identificadas como clases. También identificar otra
        clase página. La cabecera, cuerpo y pie son partes de la página. Plantear una
        clase página que contenga tres atributos de tipo objeto.

        Crear la clase llamada Cabecera definiendo un atributo llamada $titulo que
        se carga en el constructor con tamaño de texto de título (h1) y alineado a la
        izquierda, luego se define otro método que imprime el HTML

        Crear la clase Cuerpo definiendo un atributo de tipo array donde se
        almacenan todos los párrafos. Esta clase no tiene constructor, sino un
        método llamado insertarParrafo que puede ser llamado tantas veces como
        párrafos tenga el cuerpo de la página.

        Crear la clase Pie idéntica a la clase Cabecera, solo que cuando genera el
        HTML lo hace con otro tamaño de texto (h4) y alineado al centro

        Instanciar cada una de las Clases definidas con 1 Cabecera, 3 párrafos de
        cuerpo, 1 Pie y mostrar los resultados. -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 10</title>
</head>
<body>

    <h2>ACTIVIDAD 10<br></h2>
    <form method="POST" action="Actividad10.php">
      <input type="submit" name="comenzar" value="Comenzar"><br><br>
    </form>

    <?php

        //CLASE CABECERA
        class Cabecera{
            private $titulo;

            public function __construct($titulo){
                $this->titulo = $titulo;
            }

            public function mostrar(){
                echo '<h1 align=rigth>' . $this->titulo . '</h1>';
            }
        }

        //CLASE CUERPO
        class Cuerpo{
            private $parrafo = array();

            public function InsertarParrafo($parrafo){
                $this->parrafo[] = $parrafo;
            }

            public function mostrar(){
                for ($i=0; $i<count($this->parrafo); $i++){
                    echo $this->parrafo[$i] . '<br>';
                }
            }
        }

        //CLASE PIE
        class Pie{
            private $pie;

            public function __construct($pie){
                $this->pie = $pie;
            }

            public function mostrar(){
                echo '<h4 align=center>' . $this->pie . '</h4>';
            }
    
        }
    
    
        //TEST
        if (isset($_POST["comenzar"])){
            $cabecera1 = new cabecera("PAGINA PRINCIPAL");
			$cabecera1->mostrar();
			
			$cuerpo1 = new cuerpo();
			$cuerpo1->insertarParrafo("LINEA NUMERO UNO DEL PÁRRAFO");
			$cuerpo1->insertarParrafo("LINEA NUMERO DOS DEL PÁRRAFO");
			$cuerpo1->insertarParrafo("LINEA NUMERO TRES DEL PÁRRAFO");
			$cuerpo1->mostrar();

			$pie1 = new pie("PIE DE PAGINA");
			$pie1->mostrar();
        }

    ?>

</body>
</html>