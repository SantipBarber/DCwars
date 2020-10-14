<?php
    class Humano extends Personaje {
        //Atributos
        private $oficio;
        //Métodos
        function __construct($nombre, $apellidos, $años, $sexo, $planeta, $fuerza, $velocidad, $resistencia, $dinero , $oficio)
        {
            parent::__construct($nombre, $apellidos, $años, $sexo, $planeta, $fuerza, $velocidad, $resistencia, $dinero);
            $this->oficio = $oficio;
        }

    }
    // $loisLane = new Humano("Lois", "Lane", 35, "Femenino", "Tierra", 10, 5, 3);

    // print_r($loisLane);

    

?>