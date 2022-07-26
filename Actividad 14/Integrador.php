<?php
    //La clase persona se utilizara para instanciar a los alumnos y a los profesores
    class persona { 
        private $nombre;
        private $DNI;

        public function __construct($nom, $dni)
        {
            $this->nombre = $nom;
            $this->DNI = $dni;
        }

        public function getNombre ()
        {
            return $this->nombre;
        }

        public function getDNI ()
        {
            return $this->DNI;
        }
        
        public function setNombre ($nombre){
            $this->nombre = $nombre;
        }

        public function setDNI ($dni){
            $this->DNI = $dni;
        }

        public function mostrarPersona (){
            echo $this->nombre.'-DNI:'.$this->DNI; 
        }
    }
    
    class legajo{
        private $alumno;
        private $condicion;
        private $nota;

        public function __construct($alum)
        {
            $this->alumno = new persona ($alum->getNombre(), $alum->getDNI());
            $this->condicion = 'LIBRE';
            $this->nota = 0;
        }

        public function getAlumno (){
            return $this->alumno;
        }

        public function getCondicion (){
            return $this->condicion;
        }

        public function getNota (){
            return $this->nota;
        }

        public function setNota ($nota){
            $this->nota = $nota;
        }

        public function setCondicion ($cond){
            $this->condicion = $cond;
        }

        public function mostrarLegajo(){
            $this->alumno->mostrarPersona();
            echo '-Condicion: '.$this->condicion.'-Nota: '.$this->nota;
        }

        public function regularizar (){
            $this->condicion = 'REGULAR';
        }

        public function promocionar (){
            $this->condicion = 'PROMOCIONADO';
        }

        public function condicion ($nota){
            if ($nota>=8){
                $this->promocionar();
            }else {
                if ($nota>=4){
                    $this->regularizar();
                }
            }
        }

        public function comparaAlumno ($alum){
            if ($this->alumno->getDNI() == $alum->getDNI() && $this->alumno->getNombre() == $alum->getNombre()){
                return true;
            }else return false;
        }
    }

    class materia {
        private $nombre;
        private $profesor;
        private $legajos;

        public function __construct ($nom, $prof)
        {
            $this->nombre = $nom;
            $this->profesor = $prof;
        }

        public function getNombre (){
            return $this->nombre;
        }

        public function getProfesor (){
            return $this->profesor;
        }

        public function getLegajos(){
            return $this->legajos;
        }

        public function setNombre ($nom){
            $this->nombre = $nom;
        }

        public function AgregarAlumnoALegajos ($alumno){
            $this->legajos[] = new legajo ($alumno);
        }

        public function mostrarMateria(){
            echo '<br>'.$this->nombre.'<br>    Profesor: ';
            $this->profesor->mostrarPersona();
            $this->retornarListaAlumnosInscriptos();
            echo '<br>';
        }

        private function buscarAlumno ($alumno)
        {
            $i=0;
            while ($i<count($this->legajos) && !$this->legajos[$i]->comparaAlumno($alumno))
            {
                $i++;
            }

            if ($i>=count($this->legajos)){
                return -1;
            }else return $i;
            
        }

        public function tomarExamen ($alumno, $nota){
            $posicion = $this->buscarAlumno($alumno);
            
            if ($posicion >= 0){
                $this->legajos[$posicion]->setNota($nota);
                $this->legajos[$posicion]->condicion($nota);
            }else {
                echo 'El alumno no esta inscripto<br>   ';
            }
        }

        public function calcularPromedio (){
            $contador = 0;
            for ($i=0; $i<count($this->legajos); $i++){
                $contador += $this->legajos[$i]->getNota();
            }

            echo '<br>La nota promedio de los alumnos es: '.$contador/count($this->legajos).'<br>';
        }

        public function retornarListaRegulares (){
            echo 'LISTA ALUMNOS REGULARES <br>';
            for ($i=0; $i<count($this->legajos); $i++){
                if ($this->legajos[$i]->getCondicion() == 'REGULAR'){
                    $this->legajos[$i]->getAlumno()->mostrarPersona();
                    echo '//';
                }
            }
        }

        public function retornarListaPromocionados (){
            echo '<br>LISTA ALUMNOS PROMOCIONADOS <br>';
            for ($i=0; $i<count($this->legajos); $i++){
                if ($this->legajos[$i]->getCondicion() == 'PROMOCIONADO'){
                    $this->legajos[$i]->getAlumno()->mostrarPersona();
                    echo '//';
                }
            }
        }

        public function retornarListaAlumnosInscriptos (){
            echo '<br>LISTA ALUMNOS INSCRIPTOS<br>';
            for ($i=0; $i<count($this->legajos); $i++){
                $this->legajos[$i]->mostrarLegajo();
                echo '//';
            }
        }
    }

    //Aqui se instancia los profesores
    $profesor = new persona ('Juan', 14314);
    $profesor1 = new persona ('Alberto', 14144);
    $profesor2 = new persona ('Jesus', 14414);

    //Aqui se instancia los alumnos
    $alumno = new persona ('Roberto', 14123);
    $alumno1 = new persona ('Jose', 121432);
    $alumno2 = new persona ('Jesus', 144123);
    $alumno3 = new persona ('Pedro', 12142);
    $alumno4 = new persona ('Maximiliano', 34124);
    $alumno5 = new persona ('Rocio', 5642334);
    $alumno6 = new persona ('Juana', 141244);
    $alumno7 = new persona ('Maria', 12144);
    
    echo "MATERIAS:<br>";//Aqui se instancia las materias
    $materia = new materia('MATEMATICA', $profesor);
    $materia->AgregarAlumnoALegajos($alumno);
    $materia->AgregarAlumnoALegajos($alumno1);
    $materia->AgregarAlumnoALegajos($alumno2);
    $materia->AgregarAlumnoALegajos($alumno3);
    $materia->AgregarAlumnoALegajos($alumno4);
    $materia->AgregarAlumnoALegajos($alumno5);
    $materia->mostrarMateria();
    
    $materia1 = new materia ('PROGRAMACION', $profesor1);
    $materia1->AgregarAlumnoALegajos($alumno);
    $materia1->AgregarAlumnoALegajos($alumno5);
    $materia1->AgregarAlumnoALegajos($alumno3);
    $materia1->AgregarAlumnoALegajos($alumno6);
    $materia1->AgregarAlumnoALegajos($alumno7);
    $materia1->AgregarAlumnoALegajos($alumno4);
    $materia1->mostrarMateria();

    $materia2 = new materia ('BASE DE DATOS',$profesor1);
    $materia2->AgregarAlumnoALegajos($alumno7);
    $materia2->AgregarAlumnoALegajos($alumno1);
    $materia2->AgregarAlumnoALegajos($alumno4);
    $materia2->AgregarAlumnoALegajos($alumno3);
    $materia2->AgregarAlumnoALegajos($alumno6);
    $materia2->AgregarAlumnoALegajos($alumno2);
    $materia2->mostrarMateria();

    $materia3 = new materia('INGLES', $profesor2);
    $materia3->AgregarAlumnoALegajos($alumno4);
    $materia3->AgregarAlumnoALegajos($alumno5);
    $materia3->AgregarAlumnoALegajos($alumno6);
    $materia3->AgregarAlumnoALegajos($alumno7);
    $materia3->AgregarAlumnoALegajos($alumno1);
    $materia3->AgregarAlumnoALegajos($alumno2);
    $materia3->mostrarMateria();
    
    echo '<br>Se toma examen en Matematica <br><br>';
    
    $materia->tomarExamen($alumno, 5);
    $materia->tomarExamen($alumno1, 3);
    $materia->tomarExamen($alumno3, 9);
    $materia->tomarExamen($alumno2, 5);

    $materia->retornarListaRegulares();
    $materia->mostrarMateria();
    $materia1->mostrarMateria();
    $materia2->mostrarMateria();
    $materia3->mostrarMateria();

    
    
    
    

?>