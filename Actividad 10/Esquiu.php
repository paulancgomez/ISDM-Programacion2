<!DOCTYPE HTML>
<html>
  <!--
    JORGE GERARDO ESQUIU
    TEC. ANALISIS DE SISTEMAS
    PROGRAMACION 2
    ACTIVIDAD 10

    Ejercicio 01:
		Una página web es común que contenga una cabecera, un cuerpo y un pie de 
		página. Secciones identificadas como clases. También identificar otra clase
		página. La cabecera, cuerpo y pie son partes de la página. Plantear una clase
		página que contenga tres atributos de tipo objeto.
		
		Crear la clase llamada Cabecera definiendo un atributo llamada $titulo que
		se carga en el constructor con tamaño de texto de título (h1) y alineado a la
		izquierda, luego se define otro método que imprime el HTML.
		
		Crear la clase Cuerpo definiendo un atributo de tipo array donde se almacenan
		todos los párrafos. Esta clase no tiene constructor, sino un método llamado 
		insertarParrafo que puede ser llamado tantas veces como párrafos tenga el 
		cuerpo de la página.
		
		Crear la clase Pie idéntica a la clase Cabecera, solo que cuando genera el
		HTML lo hace con otro tamaño de texto (h4) y alineado al centro.
		
		Instanciar cada una de las Clases definidas con 1 Cabecera, 3 párrafos de 
		cuerpo, 1 Pie y mostrar los resultados.
  -->

  <head><title>ACTIVIDAD 10</title></head>
  <body>
    <h3>EJERCICIO 01<br></h3>
    <form method="POST" action="P2_AC_10_EJ_01.php">
      <input type="submit" name="comenzar" value="Click para Comenzar"><br><br>
    </form>
  </body>
</html>

<?php
  class Pagina
		{
			public $color;
			public $idioma;
			public $servidor;
		}
	class Cabecera extends Pagina
    { public $titulo;
      public function __construct($tit)
        { $this->titulo = $tit;}
			public function mostrar()
        { echo "<h1><div style = text-align:left>".$this->titulo."</div></h1>";}
		}
	class Cuerpo extends Pagina
    { public $parrafo=array();
      public function insertarParrafo($parr)
        { $this->parrafo[] = $parr;}
			public function mostrar()
        {	for ($i=0; $i<3; $i++)
						{	echo $this->parrafo[$i]."<br>";}
				}
		}
	class Pie extends Pagina
    { public $piePag;
      public function __construct($pi)
        { $this->piePag = $pi;}
			public function mostrar()
        { echo "<h4><div style = text-align:center>".$this->piePag."</div></h4>";}
		}

  // SCRIPT PRINCIPAL
  if (isset($_POST["comenzar"]))
    { $cabecera1 = new cabecera("GERARDO PRODUCCIONES");
			$cabecera1->mostrar();
			
			$cuerpo1 = new cuerpo();
			$cuerpo1->insertarParrafo("LINEA NUMERO UNO DEL PÁRRAFO");
			$cuerpo1->insertarParrafo("LINEA NUMERO DOS DEL PÁRRAFO");
			$cuerpo1->insertarParrafo("LINEA NUMERO TRES DEL PÁRRAFO");
			$cuerpo1->mostrar();

			$pie1 = new pie("gerardo_sq@hotmail.com");
			$pie1->mostrar();
    }
?>