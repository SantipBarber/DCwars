<?php
    class Heroe extends Personaje {
        //Atributos
        private $poder;
        private $alias;

        //Métodos

        public function __construct($nombre, $apellidos, $años, $sexo, $planeta, $fuerza, $velocidad, $resistencia, $dinero, $poder, $alias)
        {
            parent::__construct($nombre, $apellidos, $años, $sexo, $planeta, $fuerza, $velocidad, $resistencia, $dinero);
            $this->poder = $poder;
            $this->alias= $alias;
        }

        function getAlias(){
            return $this->alias;
        }

        function ataqueHeroe(){
            $valorAtaque = rand(0,10);
            $valorDefensa = rand(0,10);
            $injury = $valorAtaque - $valorDefensa;
            if( $injury >= 5 && $injury <= 10) {
                echo '<h2>',$_SESSION['villano'],' ha recibido daños graves. ¡Bien hecho!</h2>';
            } else if ($injury > 0 && $injury < 5) {
                echo '<h2> El ',$_SESSION['villano'],' ha recibido daños leves. Ataca más fuerte ',$_SESSION['heroe'],'</h2>';
            } else if ($injury <= 0 && $injury >= -10) {
                echo '<h2>',$_SESSION['villano'],' ha parado el golpe. No se han producido daños.</h2>';
            } 
            //echo '<h4> El resultado del ataque es ',$injury,'.</h4>';
            return $injury;
        }

    }
?>