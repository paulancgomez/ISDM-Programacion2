<?php 

    //CLASE PERSONA
    class Persona { 
        protected $nombre;
        protected $apellido;
        protected $fechaNacimiento;
        protected $nombreUsuario;
        protected $cantidadCambiosNombreUsuario;


        //Definir un metodo publico constructor para los atributos Nombre, Apellido y FechaNacimiento.
        public function __construct($nom,$ape,$fecnac){
            $this->nombre=$nom;
            $this->apellido=$ape;
            $this->fechaNacimiento=$fecnac;
        } 

        /*  Definir un metodo publico setter para el atributo NombreUsuario controlando
            que la CantidadCambiosNombreUsuario no supere de 2 y el NombreUsuario
            posea al menos 8 caracteres. */

        public function set_nombreUsuario($nomusu){
            $this->nombreUsuario = $nomusu;
        }

        //Definir el metodo publico getter que reuna el Nombre y Apellido.
        public function get_NombreyApellido(){
            return ' Nombre:'.$this->nombre . ' ' . $this->apellido.'<br>';
        }

        //Definir el metodo publico getter que devuelva del NombreUsuario.
        public function get_NombreUsuario(){
            return 'Usuario: '.$this->nombreUsuario.'<br>';
        }
        
        //Definir el metodo publico getter que devuelva la Edad de la Persona.
        function get_Edad($fecnac){
            $FN=$this->fechaNacimiento;
            list($dia,$mes,$año) = explode("-",$FN);
            $dia = date("d") - $dia;
            $mes = date("m") - $mes;
            $año = date("Y") - $año;
            if ($dia < 0 || $mes < 0)
                $año--;
            return 'Edad:'.$año.'<br>';
        }
    
    }

    //CLASE PRINCIPAL

    //Instanciar una persona con su Nombre, Apellido y Fecha Nacimiento.
    $persona = new Persona("Nicole", "Gomez", "04-06-2000");

    // Ingresar un NombreUsuario con menos de 8 caracteres.
    $persona->set_nombreUsuario('nicole');

    //Ingresar un NombreUsuario con al menos 8 caracteres.
    $persona->set_nombreUsuario('nicole123');

    // Ingresar un NombreUsuario con al menos 8 caracteres diferente al anterior.
    $persona->set_nombreUsuario('nicolegomez');

    //Mostrar el Nombre y Apellido, Edad y NombreUsuario.
    echo $persona->get_NombreyApellido();
    echo $persona->get_Edad($fechaNacimiento);
    echo $persona->get_NombreUsuario();

    //Mostrar el NombreUsuario.
    echo $persona->get_NombreUsuario();

?>