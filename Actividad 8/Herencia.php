<?php
Class Padre
{
    public $nombre;

    public function __construct($nom)
    {
        $this->nombre=$nom;
    }

    public function GetNombrePadre()
    {
        echo $this->nombre."<br>";
    }
}

Class Hijo extends Padre
{
    public $profesion;

    public function cargar($pro)
    {
        $this->profesion=$pro;
    }

    public function GetProfesion()
    {
        echo $this->profesion."<br>";
    }
}

$Padre=new Padre("Jesus Gonzalez");
$Padre->GetNombrePadre();

$Hijo1=new Hijo("Carlos Gonzalez");
$Hijo1->GetNombrePadre();
$Hijo1->cargar("Maestro");
$Hijo1->GetProfesion();

$Hijo2=new Hijo("Isabel Gonzalez");
$Hijo2->GetNombrePadre();
$Hijo2->cargar("Quimica");
$Hijo2->GetProfesion();

?>