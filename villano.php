<?php
    class Villano extends Personaje {
        //Atributos
        private $poder;
        private $alias;
        private $rango;

        //Métodos

        function __construct($nombre, $apellidos, $años, $sexo, $planeta, $fuerza, $velocidad, $resistencia, $dinero, $poder, $alias, $rango)
        {
            parent::__construct($nombre, $apellidos, $años, $sexo, $planeta, $fuerza, $velocidad, $resistencia, $dinero);
            $this->poder = $poder;
            $this->alias = $alias;
            $this->rango = $rango;
        }
        
        function getAlias(){
            return $this->alias;
        }

        // function getResistencia(){
        //     return $this->resistencia;
        // }

        // function setResistencia($daño){
        //     $this->resistencia = $this->resistencia - $daño;
        // }

        function ataqueVillano(){
            $valorAtaque = rand(0,10);
            $valorDefensa = rand(0,10);
            $injury = $valorAtaque - $valorDefensa;
            if( $injury > 5 && $injury <= 10) {
                echo '<h2>',$_SESSION['villano'],' ha golpeado fuerte a ',$_SESSION['heroe'],'. Los daños han sido graves.</h2>';
            } else if ($injury >= 0 && $injury < 5) {
                echo '<h2>',$_SESSION['heroe'],' ha recibido daños. Debes defender mejor ',$_SESSION['heroe'],'</h2>';
            } else if ($injury <= 0 && $injury >= -10) {
                echo '<h2>'.$_SESSION['villano'].' ha rechazado el ataque de '.$_SESSION['heroe'],'. No ha recibido daños.</h2>';
            } 
            //echo '<h4> El resultado del ataque es ',$injury,'.</h4>';
            return $injury;
        }

        
        // function comprarArma($tipoArma){
        //     $precio = $tipoArma->verPrecio();
        //     if($precio < $this->dinero){
        //         echo "Puedes comprar el arma.<br>";
        //         $armaComprada = $tipoArma;
        //     }
        //     return $tipoArma;
        // }

        // function disparar($armaComprada, $victima, $numDisparos){
        //     $municionRestante = $armaComprada->verCarga();
        //     $municionRestante -= $numDisparos;
        //     $armaComprada->setCarga($municionRestante);
        //     echo '<h4>Has realizado '.$numDisparos.' disparos ---- BANG BANG ----- a '.$victima.'<h4>.';
        // }

        // function atacarKripto($victima){
        //     echo '<h1>El villano ',$this->alias,' está atacando a ',$victima->getAlias(),' con ',MeteoritoKripton::kriptonita,'</h1>';
        // }
    }
?>