<?php
    
    //A partir de la Clase Persona definida en la Actividad Nro.11, realizar:
    require_once ("Actividad11.php");

    //CLASE ALUMNO

    //Definir una clase extendida denominada Alumnos.
    class Alumno extends Persona{
        //ATRIBUTOS
        protected $materias=array();
        protected $cant_Materias;

        //METODOS

        public function get_Materias(){
            return $this->materias;
        }

        public function set_Materias($mate, $posi){
            $this->materias[$posi] = $mate;
        }

        public function get_CantMaterias(){
            return $this->cantMaterias;
        }

		public function set_CantMaterias(){
            $this->cant_Materias = count($this->get_Materias());
        }

        //Definir un método que ingrese las materias que cursa en la Clase Alumnos.
        public function cargar_Materias($mat, $pos){
            $this->set_Materias($mat, $pos);
        }
        
        //Definir un método que muestre las materias que cursa en la Clase Alumnos.
	  	public function mostrar_Materias(){
            echo "<pre>";
            echo "<H3>MATERIAS DEL ALUMNO</H3>";
            echo "<h4>";
            print_r($this->get_Materias());
            echo "</h4></pre>";
		}
	}

    //CLASE PRINCIPAL

    //Instanciar una persona con su Nombre, Apellido, Fecha Nacimiento y NombreUsuario
    $persona = new Persona("Pau", "Cardozo", "04-06-2000");
    $persona->set_NombreUsuario("paulacardozo");

    //Mostrar el Nombre y Apellido, Edad y NombreUsuario de la Persona.
    echo $persona->get_NombreyApellido();
    echo $persona->get_Edad($fechaNacimiento);
    echo $persona->get_NombreUsuario();

    //Instanciar un Alumno con su Nombre, Apellido, Fecha Nacimiento y NombreUsuario
    $alumno = new Alumno("Olivia", "Leon", "01-02-2003");
    $alumno->set_NombreUsuario("olivia");

    //Ingresar al menos 5 materias por Alumno.
    $alumno->cargar_Materias("Ingles", 1);
    $alumno->cargar_Materias("Matematica", 2);
    $alumno->cargar_Materias("Computacion", 3);
    $alumno->cargar_Materias("Quimica", 4);
    $alumno->cargar_Materias("Fisica", 5);

    echo $alumno -> mostrar_Materias();

    //Mostrar el Nombre y Apellido, Edad y NombreUsuario del Alumno.
    echo $alumno->get_NombreyApellido();
    echo $alumno->get_Edad($fechaNacimiento);
    echo $alumno->get_NombreUsuario();

    //Definir como abstracta la Clase Persona.
    //Cambiar la Instancia de Persona a la de Alumnos.
    $alumno2 = new Persona("Emma", "Watson", "02-03-2004");

?>