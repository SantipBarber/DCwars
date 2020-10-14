<?php
    class Personaje {
        //Atributos
        protected $nombre;
        protected $apellidos;
        protected $años;
        protected $sexo;
        protected $planeta;
        protected $fuerza;
        protected $velocidad;
        protected $resistencia;
        protected $dinero;
        //Métodos
        function __construct($nombre, $apellidos, $años, $sexo, $planeta, $fuerza, $velocidad, $resistencia, $dinero)
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->años = $años;
            $this->sexo = $sexo;
            $this->planeta = $planeta;
            $this->fuerza = $fuerza;
            $this->velocidad = $velocidad;
            $this->resistencia = $resistencia;
            $this->dinero = $dinero;
        }

        // function __destruct()
        // {
        //     //echo "<h4>El personaje ha sido eliminado</h4>";
        // }

        function getNombre(){
            return $this->nombre;
        }

        function getApellidos(){
            return $this->apellidos;
        }
        
        function getResistencia(){
            return $this->resistencia;
        }

        function setResistencia($injury){
            if($injury > 0) {
                $this->resistencia = $this->resistencia - $injury;
            }
        }

    }

    
?>