<?php
//DEFINIMOS CLASES

    //CLASE PERSONA
    class Persona{
        //ATRIBUTOS
        protected $nombre;
        protected $dni;

        //METODOS
        function __construct($nombre, $dni){
            $this->nombre = $nombre;
            $this->dni = $dni;
        }
    }

    //CLASE PROFESOR
    class Profesor extends Persona{
        //METODOS
        function __construct($nombre, $dni){
            $this->nombre = $nombre;
            $this->dni = $dni;
        }

        public function mostrarinformaciondocente(){
            echo "Nombre Docente: " . $this->nombre .  ' | ' . 'DNI: ' . $this->dni . '<br>';
        }
    }

    //CLASE ALUMNO
    class Alumno extends Persona{
        //METODOS
        function __construct($nombre, $dni){
            $this->nombre = $nombre;
            $this->dni = $dni;
        }

        public function mostrarinformacionalumno(){
            echo "Nombre Alumno: " . $this->nombre .  ' | ' . 'DNI: ' . $this->dni . '<br>';
        }
    }

    //CLASE LEGAJO
    class Legajo{
        //ATRIBUTOS
        protected $alumno;
        protected $condicion;
        protected $nota;
        protected $regulares;

        //METODOS
        function __construct($alumno, $condicion, $nota){
            $this->alumno = $alumno;
            $this->condicion = $condicion;
            $this->nota = $nota;
            $this->regulares=[];
        }

        public function Regularizar($nota){
            //Preguntamos si Nota es mayor a 5 Regulariza, en caso contrario desaprueba.
            ($nota > 5) ? $this->condicion = 'REGULAR' : $this->condicion = 'DESAPROBADA';
            $this->regulares[]="Nombre Estudiante";
        }

        public function Promocionar($nota){
            //Preguntamos si Nota es mayor a 7 Promociona, en caso contrario, pregunta que condicion tiene de regularidad.
            ($nota > 7) ? $this->condicion = 'PROMOCIONADA' : $this->Regularizar($nota);
        }

        public function getMostrarRegulares(){
            echo "Regulares: <br>";
            for ($i = 1; $i < count($this->regulares); $i++) {
                echo $this->regulares[$i] . "<br>";
            }
        }

        public function imprimirCondicion(){
            echo "<strong>Estudiante:</strong>" . $this->alumno . "<br>";
            echo "<strong>Calificación:</strong>" . $this->nota . "<br>";
            echo "NOTA: " . $this->nota . "<br>";
            $this->Promocionar($this->nota);
            echo "CONDICION: " . $this->condicion . "<br><hr>";

            switch($this->condicion){
                case "PROMOCIONADA":
                    //Accion
                    break;
                case "REGULAR":
                    //Aqui suma en el array 
                    $this->regulares[]=$this->alumno;
                    break;
                case "DESAPROBADA":
                    //Accion
                    break;
            }
        }

    }

    //CLASE MATERIA
    class Materia{
        //ATRIBUTOS
        protected $nombre;
        protected $profesor;
        protected $legajos = array();

        //METODOS
        function __construct($nombre, $profesor, $legajos){
            $this->nombre = $nombre;
            $this->profesor = $profesor;
            $this->legajos[] = $legajos;
        }

        public function AgregarAlumnoALegajo($legajo){
            $this->legajos[] = $legajo;
        }

        public function getMostrarLegajos(){
            echo "LEGAJOS: <br>";
            for ($i = 1; $i < count($this->legajos); $i++) {
                echo $this->legajos[$i] . "<br>";
            }
        }

        public function getProfesor(){
            echo "<strong>Profesor: " . $this->profesor . '</strong><br>';
        }

        public function getMateria(){
            echo "<strong>Materia: " . $this->nombre . '</strong><br>';
        }

    }

    //CLASE PRINCIPAL
    echo '<h1>Docentes</h1>';
    $profesor = new Profesor('Marcelo Paez', '27502248');
    $profesor->mostrarinformaciondocente();
    $profesor = new Profesor('Rodrigo Saenz', '31258981');
    $profesor->mostrarinformaciondocente();
    $profesor = new Profesor('Juan Escalante', '41258981');
    $profesor->mostrarinformaciondocente();

    echo '<br>';

    echo '<h1>Estudiantes</h1>';
    $alumno = new Alumno('Perez Jose', '45698756');
    $alumno->mostrarinformacionalumno();
    $alumno = new Alumno('Zarate Juan', '45698756');
    $alumno->mostrarinformacionalumno();
    $alumno = new Alumno('Ramos Pablo', '35698756');
    $alumno->mostrarinformacionalumno();
    $alumno = new Alumno('Arroyo Federico', '25698756');
    $alumno->mostrarinformacionalumno();
    $alumno = new Alumno('Rodriguez Pablo', '27698756');
    $alumno->mostrarinformacionalumno();

    echo '<br>';

    echo '<h1>Materias</h1>';
    //$materia = new Materia('Arroyo', 'Federico', '25698756','Arroyo', 'Federico', '25698756','Arroyo', 'Federico');
    $materia = new Materia('Matemática', 'Villanueva Marcelo', '');
    echo $materia->getMateria() . "<br>";
    echo $materia->getProfesor() . "<br>";
    $materia->AgregarAlumnoALegajo('45692566');
    $materia->AgregarAlumnoALegajo('45698756');
    $materia->AgregarAlumnoALegajo('35698756');
    $materia->AgregarAlumnoALegajo('25698756');
    $materia->AgregarAlumnoALegajo('41258981');
    $materia->getMostrarLegajos();

    echo '<br>';

    $materia = new Materia('Lengua', 'Pardo Pedro', '');
    echo $materia->getMateria() . "<br>";
    echo $materia->getProfesor() . "<br>";
    $materia->AgregarAlumnoALegajo('45692566');
    $materia->AgregarAlumnoALegajo('45698756');
    $materia->AgregarAlumnoALegajo('35698756');
    $materia->AgregarAlumnoALegajo('25698756');
    $materia->AgregarAlumnoALegajo('41258981');
    $materia->getMostrarLegajos();

    echo '<br>';

    $materia = new Materia('Ingles', 'Pciapiedra Alfonzo', '');
    echo $materia->getMateria() . "<br>";
    echo $materia->getProfesor() . "<br>";
    $materia->AgregarAlumnoALegajo('45692566');
    $materia->AgregarAlumnoALegajo('45698756');
    $materia->AgregarAlumnoALegajo('35698756');
    $materia->AgregarAlumnoALegajo('25698756');
    $materia->AgregarAlumnoALegajo('41258981');
    $materia->getMostrarLegajos();

    echo '<br>';

    $materia = new Materia('Geografia', 'Piter Alfonzo', '');
    echo $materia->getMateria() . "<br>";
    echo $materia->getProfesor() . "<br>";
    $materia->AgregarAlumnoALegajo('45692566');
    $materia->AgregarAlumnoALegajo('45698756');
    $materia->AgregarAlumnoALegajo('35698756');
    $materia->AgregarAlumnoALegajo('25698756');
    $materia->AgregarAlumnoALegajo('41258981');
    $materia->getMostrarLegajos();

    echo '<h1>Examenes</h1>';

    $alumno = new Legajo('Zarate 45692566', '', '10');
    $alumno->imprimirCondicion();

    $alumno = new Legajo('Vilte 25698756', '', '10');
    $alumno->imprimirCondicion();

    $alumno = new Legajo('Vilte 25698756', '', '6');
    $alumno->imprimirCondicion();


?>