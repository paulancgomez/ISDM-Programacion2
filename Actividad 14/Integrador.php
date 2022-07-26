<!DOCTYPE HTML>
<html>
    <head>
        <title>Actividad 14</title>
    </head>
    <body>
        <?php

            //----------------CLASE PERSONA----------------------------
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

                public function iguales($dni){
                    if($this->dni == $dni){
                        return true;
                    }else{
                        return false;
                    }
                }

                public function MostrarPersona (){
                    echo $this->nombre.' - DNI: '.$this->dni.'<br>'; 
                }
            }

            //-------------------CLASE PROFESOR-------------------
            class Profesor extends Persona{

            }

            //---------------------CLASE ALUMNO------------------
            class Alumno extends Persona{

            }

            //---------------------CLASE LEGAJO------------------
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

                public function GetCondicion(){
                    return $this->condicion;
                }

                public function getNota(){
                    return end($this->nota);
                } 

                public function CargarNota($nota){
                    $this->nota[]=$nota;
                    $this->ActualizaCondicion();
                }

                public function MostrarNota(){ //Muestra la ultima nota cargada
                echo "<br> Nota:".end($this->nota);
                }

                public function MostrarTodasLasNotas(){
                    for ($i=0; $i<count($this->nota); $i++)
                        echo $this->nota[$i]." || ";
                }
                
                public function Regularizar(){
                    if ($this->condicion == "Regular"){
                        return true;
                    } else{
                        return false;
                    }
                }

                public function Promocionar(){
                    if ($this->condicion == "Promocion"){
                        return true;
                    } else{
                        return false;
                    }
                }

                public function ActualizaCondicion(){
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

                public function MostrarLegajoSimple(){
                    echo "<h3>LEGAJO</h3>";
                    $this->alumno->MostrarPersona();
                    echo "Condicion: ".$this->condicion;
                    echo $this->MostrarTodasLasNotas();
                }

                public function MostrarLegajo(){              
                    echo "<br><table border=1>";

                    echo "<tr><td colspan='4'><h3>Legajo</h3></td></tr>";
                    
                    echo "<tr><td>";
                    echo $this->alumno->GetDni();
                    echo "</td>";
                    
                    echo "<td>";
                    echo $this->alumno->GetNombre();
                    echo "</td>";

                    echo "<td>";
                    echo $this->MostrarTodasLasNotas();
                    echo "</td>";

                    echo "<td>";
                    echo $this->GetCondicion();
                    echo "</td></tr>";

                    echo "</table><br>";
                }

            }

            //-----------------------CLASE MATERIA----------------------
            class Materia{
                //ATRIBUTOS
                private $nombre;
                private $profesor;
                private $legajos=array();
                
                //METODOS
                public function __construct($nombre, $profesor){
                    $this->nombre=$nombre;
                    $this->profesor=$profesor;
                }

                public function AgregarAlumnoALegajo($alumno){
                    $this->legajos[]=new Legajo($alumno);
                }

                public function RetornarListaRegularizados(){
                    $alumnosRegularizados = NULL;

                    if(!empty($this->legajos)){ //Si el array es distinto de vacio
                        for ($i=0; $i<(count($this->legajos)); $i++){
                            $unLegajo = $this->legajos[$i];

                            if($unLegajo->Regularizar()){
                                $unAlumno = $unLegajo->GetAlumno();
                                $nombre = $unAlumno->GetNombre();
                                $dni = $unAlumno->GetDni();
                                $alumnosRegularizados[]=new Alumno($nombre, $dni);
                            }
                        }
                    }
                    return $alumnosRegularizados;
                }

                public function mostrarVector($vec){
                    for($i=0; $i<(count($vec)); $i++){
                        $vec[$i]->mostrarPersona();
                    }
                }
                
                public function MostrarListaRegularizados(){
                    $alumnosRegulares=array(); 
                    $alumnosRegulares=$this->RetornarListaRegularizados();

                    if(!empty($alumnosRegulares)){ //Si el array es distinto de vacio
                        echo "<table border=1>";
                        echo "<tr><td colspan='2'><h3>Alumnos Regularizados</h3></td></tr>";
                        for($i=0; $i<count($alumnosRegulares); $i++){
                            echo "<tr><td>";
                            echo $alumnosRegulares[$i]->GetDni();
                            echo "</td>";
                            echo "<td>";
                            echo $alumnosRegulares[$i]->GetNombre();
                            echo "</td></tr>";
                        }
                        echo "</table>";
                    }else{
                        echo '<i>**No hay alumnos regularizados**</i><br><br>';
                    }
                }

                public function RetornarListaPromocionados(){
                    $alumnosPromocionados = NULL;
                    if(!empty($this->legajos)){ //Si el array es distinto de vacio
                        for ($i=0; $i<(count($this->legajos)); $i++){
                            $unLegajo = $this->legajos[$i];

                            if($unLegajo->Promocionar()){
                                $unAlumno = $unLegajo->GetAlumno();
                                $nombre = $unAlumno->GetNombre();
                                $dni = $unAlumno->GetDni();
                                $alumnosPromocionados[]=new Alumno($nombre, $dni); 
                            }
                        }
                    }
                    return $alumnosPromocionados;
                }

                public function MostrarListaPromocionados(){
                    $alumnosPromocionados=array(); 
                    $alumnosPromocionados=$this->RetornarListaPromocionados(); 

                    if(!empty($alumnosPromocionados)){ //Si el array es distinto de vacio
                        echo "<table border=1>";
                        echo "<tr><td colspan='2'><h3>Alumnos Promocionados</h3></td></tr>";
                        for($i=0; $i<count($alumnosPromocionados); $i++){
                            echo "<tr><td>";
                            echo $alumnosPromocionados[$i]->GetDni();
                            echo "</td>";
                            echo "<td>";
                            echo $alumnosPromocionados[$i]->GetNombre();
                            echo "</td></tr>";
                        }
                        echo "</table>";
                    }else{
                        echo '<i>**No hay alumnos promocionados**</i><br><br>';
                    }
                }

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

                public function CalcularPromedio() {
                    $alumnosInscriptos=array(); 
                    $alumnosInscriptos=$this->RetornarListaAlumnosInscriptos();

                    $suma=0;

                    for($i=0; $i<count($alumnosInscriptos); $i++){
                        $suma=$suma+$alumnosInscriptos[$i]->GetNota();
                    }
                    $promedio=$suma/count($alumnosInscriptos);
                    echo 'El promedio de '.$this->nombre.' en la materia'.$this->nombre.' es: '.$promedio.'<br>';
                }

                public function TomarExamen($alumno){
                    $alumnosInscriptos=array(); 
                    $alumnosInscriptos=$this->RetornarListaAlumnosInscriptos();
                   
                    //Buscamos si el alumno que quiere rendir esta inscripto a la materia
                    $posicion=$this->busquedaAlumno($alumnosInscriptos, $alumno->GetDni());
                    
                    if($posicion != -1){
                        $nota=rand(1,10);
                        echo $alumno->GetNombre()." saco un ".$nota.' en el examen de '. $this->nombre.'<br>';
                        //Cargamos la nota en el registro de notas del alumno
                        $this->legajos[$posicion]->CargarNota($nota);
                        $this->legajos[$posicion]->MostrarLegajo();

                    }else{
                        echo 'El alumno con dni '.$alumno->GetDni().' no se encuentra inscripto en '.$this->nombre;
                    }

                }

                //METODOS EXTRAS
                public function busquedaAlumno($alumnosInscriptos, $dniBus){
                    $pos = 0;
                    while(($pos < count($alumnosInscriptos)) && !($alumnosInscriptos[$pos]->iguales($dniBus))){  //True si dni esta en el array
                        $pos++;
                    }
                    if($pos < count($alumnosInscriptos)){
                        return $pos; //Si esta
                    }
                    else{
                        return -1; //No esta
                    }
                }

                public function MostrarMateria(){
                    echo '<b>'.$this->nombre.'</b><br>';
                    echo $this->profesor->MostrarPersona().'<br>';   
                }

                public function MostrarMateriaPlanilla(){
                    echo '<b>'.$this->nombre.'</b><br>';
                    echo $this->profesor->MostrarPersona();
                    $this->MostrarListaAlumnosInscriptos();
                }

                public function MostrarMateriaCondicionFinal(){
                    $this->MostrarListaRegularizados();
                    echo '<br>';
                    $this->MostrarListaPromocionados();
                }

            }


            //---------------------CLASE PRINCIPAL-----------------------


            //PROFESORES
            $profesor1=new Profesor('Lorena Santos',21000111);
            $profesor2=new Profesor('Noelia Sanchez',22000111);
            $profesor3=new Profesor('Juan Flores',23000111);

            echo "<h3>PROFESORES</h3>";

            $profesor1->MostrarPersona();
            $profesor2->MostrarPersona();
            $profesor3->MostrarPersona();          
    

            //ALUMNOS
            $alumno1=new Alumno('Juan Perez',41000111);
            $alumno2=new Alumno('Juan Luna',42000111);
            $alumno3=new Alumno('Juan Lopez',43000111);
            $alumno4=new Alumno('Juan Leon',44000111);
            $alumno5=new Alumno('Juan Paz',45000111);

            echo "<h3>ALUMNOS</h3>";

            $alumno1->MostrarPersona();
            $alumno2->MostrarPersona(); 
            $alumno3->MostrarPersona();
            $alumno4->MostrarPersona();
            $alumno5->MostrarPersona();


            //MATERIAS
            $materia1=new Materia('Arquitectura de la Computadora', $profesor1);
            $materia2=new Materia('Sistemas Operativos', $profesor1);
            $materia3=new Materia('Ingles Tecnico I', $profesor2);
            $materia4=new Materia('Base de Datos', $profesor3);

            echo "<h3>MATERIAS</h3>";

            $materia1->MostrarMateria();
            $materia2->MostrarMateria();
            $materia3->MostrarMateria();
            $materia4->MostrarMateria();
  
            //BASE DE DATOS: Inscribir alumnos
            $materia4->AgregarAlumnoALegajo($alumno1);
            $materia4->AgregarAlumnoALegajo($alumno2);
            $materia4->AgregarAlumnoALegajo($alumno3);

            echo "<hr><h3>PLANILLAS DE MATERIAS</h3>";

            $materia1->MostrarMateriaPlanilla();
            $materia2->MostrarMateriaPlanilla();
            $materia3->MostrarMateriaPlanilla();
            $materia4->MostrarMateriaPlanilla();


            //EXAMENES
            echo '<hr><h2>EXAMENES</h2>';

            //TOMAR EXAMEN
            $materia4->TomarExamen($alumno1);
            $materia4->TomarExamen($alumno1);
            $materia4->TomarExamen($alumno2);

            //CONDICION FINAL
            echo '<hr><h2>CONDICION FINAL</h2>';
            
            $materia4->MostrarMateriaCondicionFinal();
            //$materia4->MostrarListaRegularizados();

        ?>
    </body>
</html>