<!DOCTYPE html>
<html lang="en">

    <!-- EJERCICIO:
            - Confeccionar una clase Alumnos, definir como atributos su nombre, apellido y edad.
            - Definir un método para inicializar que lleguen como dato los atributos solicitados por
              formulario html.
            - Plantear un segundo método que imprima el nombre y apellido.
            - Plantear un tercer método que muestre un mensaje si es mayor de edad (si la edad
              es mayor a 17 años)-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 6</title>
</head>
<body>
    <!-- FORMULARIO -->
    <h1>ACTIVIDAD 6</h1>
    <form method="POST" action="Ejercicio.php">
        <fieldset>
            <legend>INGRESE DATOS</legend><br>
            <label>Nombre: <label>
                <input type="text" name="nombre" placeholder="Ingrese su nombre"><br>
            <label>Apellido: <label>
                <input type="text" name="apellido" placeholder="Ingrese su apellido"><br>
            <label>Edad: <label>
                <input type="number" name="edad" placeholder="Ingrese su edad"><br>
            <input type="submit" name="enviar" value="Enviar"><br>
            <input type="reset" name="borrar" value="Borrar"><br>
    	</fieldset>

    </form>

    <!-- CODIGO PHP -->
    <?php
        class Alumno{
            public $nombre;
            public $apellido;
            public $edad;  

            public function __construct($nombre, $apellido, $edad){
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->edad = $edad;
            }

            public function cargarForm(){
                $this->nombre = $_POST["nombre"];
                $this->apellido = $_POST["apellido"];
                $this->edad = $_POST["edad"];
            }
            
            public function mostrarNombreApellido(){
                echo '<h3>ALUMNO</h3>';
                echo $this->nombre.' '.$this->apellido;
            }

            public function mostrar(){
                echo '<h3>DATOS DEL ALUMNO</h3>';
                echo '<b>Nombre:</b> '.$this->nombre;
                echo '<br><b>Apellido:</b> '.$this->apellido;
                echo '<br><b>Edad:</b> '.$this->edad;
            }

            public function esMayorEdad(){
                if ($this->edad > 17){
                    echo "<br>Es mayor de edad<br>";
                }
                else{
                    echo "<br>NO es mayor de edad<br>";
                }
            }

        }

        //TEST
        if (isset($_POST["enviar"])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $edad = $_POST['edad'];

            $alumno = new Alumno($nombre, $apellido, $edad);

            $alumno->mostrarNombreApellido();
            $alumno->esMayorEdad();
    } 
    ?>

</body>
</html>