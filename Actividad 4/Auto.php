<html>
<head>
<title>Pruebas</title>
</head>
<body>
<?php

class Auto
{
  public $modelo;
  public $marca;
  public $color;
  public $velocidadmaxima;

  /*  
  public function __construct($mod,$mar,$col,$velmax)
  {
    $this->modelo=$mod;
    $this->marca=$mar;
    $this->color=$col;
    $this->velocidadmaxima=$velmax;
  }
  */

  public function Cargar($mod,$mar,$col,$velmax)
  {
    $this->modelo=$mod;
    $this->marca=$mar;
    $this->color=$col;
    $this->velocidadmaxima=$velmax;
  }

  public function Mostrar()
  {
    echo 'Modelo: '.$this->modelo;
    echo 'Marca: '.$this->marca;
    echo 'Color: '.$this->color;
    echo 'Velocidad Máxima: '.$this->velocidadmaxima;
  }

}



// Instanciación

$Auto1=new Auto();

$Auto1->Cargar("Cruze","Chevrolet","Azul",250);

$Auto1->Mostrar();

/*
$Auto2=new Auto("Smart","Smart","Blanco",120);

$Auto2->Mostrar();

$Auto3=new Auto("Mustang","Ford","Rojo",350);

$Auto3->Mostrar();

*/

?>

</body>
</html>