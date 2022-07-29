<!DOCTYPE HTML>
<html>
    <head>
        <title>TP Integrador</title>
    </head>
    <body>
        <?php
            //CLASE PROFESOR
            class Profesor{
                //ATRIBUTOS
                public $nombre;
                public $dni;

                //METODOS
                public function CargarProfesor($nomb,$dni){
                    $this->nombre=$nomb;
                    $this->dni=$dni;
                }

                public function MostrarProfesor(){
                    echo "Nombre del Profesor:".$this->nombre;
                    echo "<br> DNI:".$this->dni."<br>";
                }
            }

            //CLASE ALUMNO
            class Alumno extends Profesor{
                //METODOS
                public function CargarAlumno($nomb,$dni){
                    $this->nombre=$nomb;
                    $this->dni=$dni;
                }

                public function MostrarAlumno(){
                    echo "Nombre del Alumno:".$this->nombre;
                    echo "<br> DNI:".$this->dni."<br>";
                }

            }

            //CLASE LEGAJO
            class Legajo extends Alumno{
                public $nota=array();
                public $condicion;

                public function cargarnota($not){
                    $this->nota[]=$not;
                }

                public function mostrarnota(){// Muestra la ultima nota cargada
                echo "<br> Nota:".end($this->nota);
                }

                public function MostrarTodasLasNotas(){
                    for ($i=0;$i<count($this->nota);$i++)
                        echo $this->nota[$i]."||";
                    echo "<br>";
                }
                
                public function Regularizar(){ //ESTA FUNCION SE ACTIVARA SI LA MATERIA NO ES PROMOCIONAL
                    if (end($this->nota)>=4){
                        $this->condicion="Regular";
                    } else{
                        $this->condicion="Libre";
                    }
                }

                public function Promocionar(){ //ESTA FUNCION SE ACTIVARA SI LA MATERIA ES PROMOCIONAL
                    if (end($this->nota)<4){
                        $this->condicion="Libre";
                    } else if (end($this->nota)<7){
                        $this->condicion="Regular";
                    } else{
                        $this->condicion="Promocion";
                    }
                }

                public function mostrarcondicion(){
                    echo "<br> Condicion:".$this->condicion;
                }
            }

            //CLASE MATERIA
            class Materia extends Legajo{
                //ATRIBUTOS
                public $nombremateria;
                public $legajos=array();
                public $Listaderugularizados=array();
                public $ListadePromocionados=array();
                
                //METODOS
                public function __construct($nombr){
                    $this->nombremateria=$nombr;
                }

                public function mostrarnombremateria(){
                    echo "<br>Nombre de la Materia:".$this->nombremateria."<br>";   
                }

                public function AgregarAlumnoALegajo(){
                    $this->legajos[]=$this->nombre;

                }

                public function RetornarListaAlumnosInscriptos(){
                    echo "<table border=1>";
                    echo "<tr><td><h3>Lista de Alumnos Inscriptos</h3></td></tr>";
                    for ($i=0;$i<(count($this->legajos));$i++){
                            echo "<tr><td>";
                            echo $this->legajos[$i];
                            echo "</td></tr>";
                    }
                    echo "</table>";
                }

                public function Listaderegularizados(){
                    if ($this->condicion=="Regular"){
                        $this->Listaderegularizados[]=$this->nombre;
                    }
                }

                public function RetornarListaderegularizados(){
                    echo "<table border=1>";
                    echo "<tr><td><h3>Lista de Alumnos Regulares</h3></td></tr>";
                    for($i=0;$i<count($this->Listaderegularizados);$i++){
                        echo "<tr><td>";
                        echo $this->Listaderegularizados[$i]."<br>";
                        echo "</td></tr>";
                    }
                    echo "</table>";

                }
                public function ListadePromocionados(){
                    if ($this->condicion=="Promocion"){
                        $this->ListadePromocionados[]=$this->nombre;
                    }
                }

                public function RetornarListadePromocionados(){
                    echo "<table border=1>";
                    echo "<tr><td><h3>Lista de Alumnos Promocionados</h3></td></tr>";
                    for($i=0;$i<count($this->ListadePromocionados);$i++){
                        echo "<tr><td>";
                        echo $this->ListadePromocionados[$i]."<br>";
                        echo "</td></tr>";
                    }
                    echo "</table>";
                }

                public function CalcularPromedio() {
                    $suma=0;
                    for($i=0;$i<count($this->nota);$i++)
                    {
                        $suma=$suma+$this->nota[$i];
                    }
                    $promedio=$suma/count($this->nota);
                    echo "El promedio de $this->nombre en la materia $this->nombremateria es: $promedio <br>";
                }

                public function TomarExamen(){
                    $this->nota[]=rand(1,10);
                    echo "<br> $this->nombre se saco ".end($this->nota)." en el examen <br>";
                }

            }

            //CLASE PRINCIPAL

            //instaciacion
            $profesor1=new Profesor();
            $profesor1->CargarProfesor("Juan Perez","22445566");
            $profesor1->MostrarProfesor();

            $profesor2=new Profesor();
            $profesor2->CargarProfesor("Jose Gonzalez","20405060");
            $profesor2->MostrarProfesor();
            
            $profesor3=new Profesor();
            $profesor3->CargarProfesor("Hugo fernandez","25455565");
            $profesor3->MostrarProfesor();
            
            $alumno1=new Alumno();
            $alumno1->CargarAlumno("Rodrigo Tejerina","30611510");
            $alumno1->MostrarAlumno();

            $alumno2=new Alumno();
            $alumno2->CargarAlumno("Gonzalo Rivera","32633810");
            $alumno2->MostrarAlumno();
            
            $alumno3=new Alumno();
            $alumno3->CargarAlumno("Sebastian Molinas","29813999");
            $alumno3->MostrarAlumno();

            $alumno4=new Alumno();
            $alumno4->CargarAlumno("Sabrina Mayorga","33753970");
            $alumno4->MostrarAlumno();

            $alumno5=new Alumno();
            $alumno5->CargarAlumno("Tadeo Yanez","45753970");
            $alumno5->MostrarAlumno();

            $materia1=new Materia("Programacion 1"); // Esta materia NO se puede promocionar
            $materia1->mostrarnombremateria();
            $materia1->CargarProfesor("Juan Perez","22445566");
            $materia1->MostrarProfesor();
            $materia1->CargarAlumno("Gonzalo Rivera","32633810");
            $materia1->AgregarAlumnoALegajo();
            $materia1->CargarAlumno("Rodrigo Tejerina","30611510");
            $materia1->AgregarAlumnoALegajo();
            $materia1->CargarAlumno("Sebastian Molinas","29813999");
            $materia1->AgregarAlumnoALegajo();
            $materia1->CargarAlumno("Sabrina Mayorga","33753970");
            $materia1->AgregarAlumnoALegajo();
            $materia1->CargarAlumno("Tadeo Yanez","45753970");
            $materia1->AgregarAlumnoALegajo();
            $materia1->CargarAlumno("Luciano Rivera","42833000");
            $materia1->AgregarAlumnoALegajo();
            $materia1->RetornarListaAlumnosInscriptos();
            $materia1->CargarAlumno("Rodrigo Tejerina","30611510");
            $materia1->TomarExamen();// Nota al azar
            $materia1->Regularizar();
            $materia1->Listaderegularizados();
            $materia1->CargarAlumno("Tadeo Yanez","45753970");
            $materia1->TomarExamen();// Nota al azar
            $materia1->Regularizar();
            $materia1->Listaderegularizados();
            $materia1->CargarAlumno("Gonzalo Rivera","32633810");// aqui se regulariza a un alumno
            $materia1->cargarnota(6);
            $materia1->Regularizar();
            $materia1->Listaderegularizados();
            $materia1->RetornarListaderegularizados();
            
            $materia2=new Materia("Matematica");
            $materia2->mostrarnombremateria();
            $materia2->CargarProfesor("Hugo fernandez","25455565");
            $materia2->MostrarProfesor();
            $materia2->CargarAlumno("Gonzalo Rivera","32633810");
            $materia2->AgregarAlumnoALegajo();
            $materia2->CargarAlumno("Rodrigo Tejerina","30611510");
            $materia2->AgregarAlumnoALegajo();
            $materia2->CargarAlumno("Sebastian Molinas","29813999");
            $materia2->AgregarAlumnoALegajo();
            $materia2->CargarAlumno("Sabrina Mayorga","33753970");
            $materia2->AgregarAlumnoALegajo();
            $materia2->CargarAlumno("Tadeo Yanez","45753970");
            $materia2->AgregarAlumnoALegajo();
            $materia2->CargarAlumno("Luciano Rivera","42833000");
            $materia2->AgregarAlumnoALegajo();
            $materia2->RetornarListaAlumnosInscriptos();

            $materia3=new Materia("Programacion 2");
            $materia3->mostrarnombremateria();
            $materia3->CargarProfesor("Jose Gonzalez","20405060");
            $materia3->MostrarProfesor();
            $materia3->CargarAlumno("Gonzalo Rivera","32633810");
            $materia3->AgregarAlumnoALegajo();
            $materia3->CargarAlumno("Rodrigo Tejerina","30611510");
            $materia3->AgregarAlumnoALegajo();
            $materia3->CargarAlumno("Sebastian Molinas","29813999");
            $materia3->AgregarAlumnoALegajo();
            $materia3->CargarAlumno("Sabrina Mayorga","33753970");
            $materia3->AgregarAlumnoALegajo();
            $materia3->CargarAlumno("Tadeo Yanez","45753970");
            $materia3->AgregarAlumnoALegajo();
            $materia3->CargarAlumno("Luciano Rivera","42833000");
            $materia3->AgregarAlumnoALegajo();
            $materia3->RetornarListaAlumnosInscriptos();

            $materia4=new Materia("Base de Datos");
            $materia4->mostrarnombremateria();
            $materia4->CargarProfesor("Juan Perez","22445566");
            $materia4->MostrarProfesor();
            $materia4->CargarAlumno("Gonzalo Rivera","32633810");
            $materia4->AgregarAlumnoALegajo();
            $materia4->CargarAlumno("Rodrigo Tejerina","30611510");
            $materia4->AgregarAlumnoALegajo();
            $materia4->CargarAlumno("Sebastian Molinas","29813999");
            $materia4->AgregarAlumnoALegajo();
            $materia4->CargarAlumno("Sabrina Mayorga","33753970");
            $materia4->AgregarAlumnoALegajo();
            $materia4->CargarAlumno("Tadeo Yanez","45753970");
            $materia4->AgregarAlumnoALegajo();
            $materia4->CargarAlumno("Luciano Rivera","42833000");
            $materia4->AgregarAlumnoALegajo();
            $materia4->RetornarListaAlumnosInscriptos();
                 
        ?>
    </body>
</html>