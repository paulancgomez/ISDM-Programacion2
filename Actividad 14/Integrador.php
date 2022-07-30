<!DOCTYPE HTML>
<html>
    <head>
        <title>Actividad 14</title>
    </head>
    <body>
        <?php

            //CLASE PERSONA
            class Persona {
                //ATRIBUTOS 
                protected $nombre;
                protected $dni;

                //METODOS
                public function __construct($nombre, $dni){
                    $this->nombre=$nombre;
                    $this->dni=$dni;
                }

                public function GetNombre(){
                    return $this->nombre;
                }

                public function SetNombre($nombre){
                    $this->nombre = $nombre;
                }

                public function GetDni(){
                    return $this->dni;
                }
                
                public function SetDni($dni){
                    $this->dni = $dni;
                }

                public function MostrarPersona (){
                    echo $this->nombre.'- DNI: '.$this->dni.'<br>'; 
                }
            }

            //CLASE PROFESOR
            class Profesor extends Persona{

            }

            //CLASE ALUMNO
            class Alumno extends Persona{

            }

            //CLASE LEGAJO
            class Legajo extends Alumno{
                //ATRIBUTOS
                private $alumno;
                private $condicion;
                private $nota;

                //METODOS
                public function __construct($alumno){
                    $this->alumno = $alumno;
                    $this->condicion = "Cursando";
                }

                public function GetAlumno(){
                    return $this->alumno;
                }

                public function CargarNota($nota){
                    $this->nota[]=$nota;
                }

                public function MostrarNota(){ //Muestra la ultima nota cargada
                echo "<br> Nota:".end($this->nota);
                }

                public function MostrarTodasLasNotas(){
                    for ($i=0; $i<count($this->nota); $i++)
                        echo $this->nota[$i]."||";
                    echo "<br>";
                }
                
                public function Regularizar(){
                    if (end($this->nota)>=4){
                        $this->condicion="Regular";
                    } else{
                        $this->condicion="Libre";
                    }
                }

                public function Promocionar(){
                    if (end($this->nota)<4){
                        $this->condicion="Libre";
                    } else if (end($this->nota)<7){
                        $this->condicion="Regular";
                    } else{
                        $this->condicion="Promocion";
                    }
                }

                public function MostrarCondicion(){
                    echo "<br> Condicion:".$this->condicion;
                }
            }

            //CLASE MATERIA
            class Materia{
                //ATRIBUTOS
                private $nombre;
                private $profesor;
                private $legajos=array();
                private $Listaderugularizados=array();
                private $ListadePromocionados=array();
                
                //METODOS
                public function __construct($nombre, $profesor){
                    $this->nombre=$nombre;
                    $this->profesor=$profesor;
                }

                public function AgregarAlumnoALegajo($alumno){
                    $this->legajos[]=new Legajo($alumno);
                }
/*
                public function RetornarListaRegularizados(){
                    echo "<table border=1>";
                    echo "<tr><td><h3>Lista de Alumnos Regulares</h3></td></tr>";
                    for($i=0; $i<count($this->Listaderegularizados); $i++){
                        echo "<tr><td>";
                        echo $this->Listaderegularizados[$i]."<br>";
                        echo "</td></tr>";
                    }
                    echo "</table>";
                }
*/
                public function RetornarListaAlumnosInscriptos(){
                    $alumnosInscriptos = NULL;
                    if(!empty($this->legajos)){ //Si el array es distinto de vacio
                        for ($i=0; $i<(count($this->legajos)); $i++){
                            $unLegajo = $this->legajos[$i];
                            $unAlumno = $unLegajo->GetAlumno();
                            $nombre = $unAlumno->GetNombre();
                            $dni = $unAlumno->GetDni();
                            $alumnosInscriptos[]=new Alumno($nombre, $dni); 
                        }
                    }
                    return $alumnosInscriptos;
                }

                public function mostrarVector($vec){
                    for($i=0; $i<(count($vec)); $i++){
                        $vec[$i]->mostrarPersona();
                    }
                }

                public function MostrarListaAlumnosInscriptos(){
                    $alumnosInscriptos=array(); 
                    $alumnosInscriptos=$this->RetornarListaAlumnosInscriptos();               
                    if(!empty($alumnosInscriptos)){ //Si el array es distinto de vacio
                        echo "<table border=1>";
                        echo "<tr><td colspan='2'><h3>Alumnos Inscriptos</h3></td></tr>";
                        for ($i=0; $i<(count($alumnosInscriptos)); $i++){
                            echo "<tr><td>";
                            echo $alumnosInscriptos[$i]->GetDni();
                            echo "</td>";
                            echo "<td>";
                            echo $alumnosInscriptos[$i]->GetNombre();
                            echo "</td></tr>";
                        }
                        echo "</table>";
                    }else{
                        echo '<i>**No hay alumnos inscriptos**</i><br><br>';
                    }
                }
/*
                public function CalcularPromedio() {
                    $suma=0;
                    for($i=0;$i<count($this->nota);$i++)
                    {
                        $suma=$suma+$this->nota[$i];
                    }
                    $promedio=$suma/count($this->nota);
                    echo "El promedio de $this->nombre en la materia $this->nombremateria es: $promedio <br>";
                }

                public function TomarExamen($alumno){
                    echo 'llego';
                    $alumnosInscriptos = retornarListaAlumnosInscriptos();
                    echo 'llego';
                    if(busquedaAlumno($alumnosInscriptos, $alumno->GetDni)){
                        $this->nota[]=rand(1,10);
                        echo "<br>".$alumno->GetNombre()." se saco ".end($this->nota)." en el examen.<br>";
                    }else{
                        echo 'El alumno con el dni '.$alumno->GetDni().' no se encuentra inscripto en '.$this->nombre;
                    }

                }

                //METODOS EXTRAS
                public function busquedaAlumno($alumnosInscriptos, $dni){
                    $pos = 0;
                    while($pos < count($alumnosInscriptos) && $alumnosInscriptos[$pos]->GetDni() != $dni){  //True si dni esta en el array
                        return true;
                    }
                    if($pos < count($alumnosInscriptos)){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
*/
                public function MostrarMateria(){
                    echo '<b>'.$this->nombre.'</b><br>';
                    echo $this->profesor->MostrarPersona().'<br>';   
                }

                public function MostrarMateriaPlanilla(){
                    echo '<b>'.$this->nombre.'</b><br>';
                    echo $this->profesor->MostrarPersona();
                    $this->MostrarListaAlumnosInscriptos();
                }
/*
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

                public function Listaderegularizados(){
                    if ($this->condicion=="Regular"){
                        $this->Listaderegularizados[]=$this->nombre;
                    }
                }

                public function ListadePromocionados(){
                    if ($this->condicion=="Promocion"){
                        $this->ListadePromocionados[]=$this->nombre;
                    }
                }
*/
            }

            //CLASE PRINCIPAL

            //PROFESORES
            $profesor1=new Profesor("Lorena Santos","21000111");
            $profesor2=new Profesor("Noelia Sanchez","22000111");
            $profesor3=new Profesor("Juan Flores","23000111");

            echo "<h3>PROFESORES</h3>";

            $profesor1->MostrarPersona();
            $profesor2->MostrarPersona();
            $profesor3->MostrarPersona();          
    

            //ALUMNOS
            $alumno1=new Alumno("Juan Perez","41000111");
            $alumno2=new Alumno("Juan Luna","42000111");
            $alumno3=new Alumno("Juan Lopez","43000111");
            $alumno4=new Alumno("Juan Leon","44000111");
            $alumno5=new Alumno("Juan Paz","45000111");

            echo "<h3>ALUMNOS</h3>";

            $alumno1->MostrarPersona();
            $alumno2->MostrarPersona(); 
            $alumno3->MostrarPersona();
            $alumno4->MostrarPersona();
            $alumno5->MostrarPersona();


            //MATERIAS
            $materia1=new Materia("Arquitectura de la Computadora", $profesor1);
            $materia2=new Materia("Sistemas Operativos", $profesor1);
            $materia3=new Materia("Ingles Tecnico I", $profesor2);
            $materia4=new Materia("Base de Datos", $profesor3);

            echo "<h3>MATERIAS</h3>";

            $materia1->MostrarMateria();
            $materia2->MostrarMateria();
            $materia3->MostrarMateria();
            $materia4->MostrarMateria();

            //BASE DE DATOS: Inscribir alumnos
            $materia4->AgregarAlumnoALegajo($alumno1);
            $materia4->AgregarAlumnoALegajo($alumno2);
            $materia4->AgregarAlumnoALegajo($alumno3);

            echo "<h3>PLANILLA DE MATERIAS</h3>";

            $materia1->MostrarMateriaPlanilla();
          $materia2->MostrarMateriaPlanilla();
            $materia3->MostrarMateriaPlanilla();
            $materia4->MostrarMateriaPlanilla();
/*
            echo '<h2>Examenes</h2>';

            //BASE DE DATOS: TOMAR EXAMEN
            $materia4->TomarExamen($alumno1);
            $materia4->TomarExamen($alumno2);
            $materia4->TomarExamen($alumno3);
*/
        ?>
    </body>
</html>