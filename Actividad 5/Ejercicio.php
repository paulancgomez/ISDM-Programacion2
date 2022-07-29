<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        //CLASE GATO
        class Gato{

            public $alias;
            public $raza;
            public $pelaje;
            public $peso;
            public $tieneHambre;

            public function __construct ($alias, $raza, $pelaje, $peso, $tieneHambre){
                $this->alias = $alias;
                $this->raza = $raza;
                $this->pelaje = $pelaje;
                $this->peso = $peso;
                $this->tieneHambre = $tieneHambre;
            }
            
            public function caminar (){
                echo '<br>' . $this->alias . ' esta caminando.' ;
            }

            public function comer (){
                if($this->tieneHambre == 1){
                    $this->tieneHambre = 0;
                    echo '<br>' . $this->alias . ' esta comiendo.' ;
                }
                else{
                    echo '<br>' . $this->alias . ' no tiene hambre.' ;
                }
                
            }
            
            public function mostrar (){
                echo '<br><br>GATO';
                echo '<br>---Alias: '.$this->alias;
                echo '<br>---Raza: '.$this->raza;
                echo '<br>---Pelaje: '.$this->pelaje;
                echo '<br>---Peso: '.$this->peso.' kg';
                echo '<br>';
            }

        }
        
        //CLASE PERSONA
        class Licuadora{

                public $marca;
                public $velocidad;
                public $capacidad;
                public $tope;
                public $encendido;
                
                public function __construct ($marca, $velocidad, $capacidad){
                    $this->marca = $marca;
                    $this->velocidad = $velocidad;
                    $this->capacidad = $capacidad;
                    $this->tope = 0;
                    $this->encendido = false;
                }

                public function agregar($elemento, $ml){
                    if($this->tope < $this->capacidad){
                        $controlar = $this->tope + $ml;
                        if($controlar < $this->capacidad){
                            $this->tope = $this->tope + $ml;
                            echo '<br>' . $elemento . ' agregada.';
                        }else{
                            echo '<br>La cantidad de ml de ' . $elemento . ' sobrepasa el tope.'; 
                        }
  
                    }
                    else{
                        echo '<br>Licuadora llena.';
                    }
                }

                public function licuar (){
                    if(!$this->encendido){
                        $this->encendido = true;
                        echo '<br>Licuando..';
                    }
                    else{
                        echo '<br>Ya se esta licuando.';
                    }
                }

                public function apagar (){
                    if($this->encendido){
                        $this->encendido = false;
                        echo '<br>Apagando Licuadora.';
                    }
                    else{
                        echo '<br>La Licuadora se encuentra apagada';
                    }
                }

                public function mostrar (){
                    echo '<br>LICUADORA';
                    echo '<br>---Marca: '.$this->marca;
                    echo '<br>---Velocidad: '.$this->velocidad;
                    echo '<br>---Capacidad: '.$this->capacidad;
                    echo '<br>';
                    echo '<br>';
                }
        }

        //TEST
        $gato = new Gato("Olivia", "Calico", "Tricolor", 40, 1);
        $gato->mostrar();
        $gato->caminar();
        $gato->comer();
        $gato->mostrar();

        $licuadora = new Licuadora("Nose", "Nose", 200);
        $licuadora->mostrar();
        $licuadora->agregar("Banana", 50);
        $licuadora->agregar("Leche", 100);
        $licuadora->licuar();
        $licuadora->apagar();
            
    ?>
</body>
</html>