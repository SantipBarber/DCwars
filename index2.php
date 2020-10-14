<?php
    require 'personajes.php';
    include 'heroe.php';
    include 'villano.php';
    /**
     * Iniciamos la SESSION
     */
    session_start();
    /**
     * Instancia del Heroe. En este caso es Superman.
     */
    $superman = new Heroe("Clark", 
                        "Kent", 
                        37, 
                        "hombre", 
                        "Kripton", 
                        100, 
                        100, 
                        100, 
                        300000, 
                        "Fuerza sobrehumana, 
                            velocidad, 
                            resistencia, 
                            agilidad, 
                            reflejos, 
                            durabilidad, 
                            sentidos y longevidad,
                            Poderes oculares,
                            Agudeza sobrehumana,
                            Visión de calor,
                            Visión del espectro electromagnético,
                            Visión microscópica,
                            Visión de rayos X,
                            Visión telescópica,
                            Visión infrarroja,
                            Aliento sobrehumano,
                            Aliento helado,
                            Aliento de viento,
                            Invulnerabilidad,
                            Factor de curación rápida,
                            Vuelo", 
                        "Superman");
    /**
     * //Instancia del Villano. En este caso es General Zod.
     */
    $zod = new Villano("Dru-Zod", 
                    "Corkript", 
                    45, 
                    "hombre", 
                    "Kripton", 
                    100, 
                    100, 
                    100, 
                    "Innecesario", 
                    "Entrenamiento militar, 
                        Estratega de nivel de genio, 
                        Tirador experto, 
                        Combatiente cuerpo a cuerpo, 
                        Superhabilidades físicas, 
                        Longevidad, Vuelo, 
                        Visión de calor, 
                        Aliento helado, 
                        Poderes extrasensoriales, 
                        Visión de rayos X", 
                    "General Zod", 
                    "SuperJefe");
    /** 
     * Creamos la variable $heroe y $villano en las que almacenamos el Alias de cada uno de ellos
     */
    $_SESSION['heroe'] = $superman->getAlias();
    $_SESSION['villano'] = $zod->getAlias();
    $_SESSION['vidaHeroe'] = $superman->getResistencia();
    $_SESSION['vidaVillano'] = $zod->getResistencia();
    /**
     * Creamos las variables $vidaHeroe y $vidaVillano en las que almacenamos el valor de la VIDA (resistencia)
     * de cada uno de ellos. A esta se le restará el resultado de los ataques.
     */
    // $vidaHeroe = $superman->getResistencia();
    // $vidaVillano = $zod->getResistencia();
    
    /**
     * Comienza nuestro documento HTML
     */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> DC Wars </title>
    <!-- LINK al CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contenedor-principal">
        <div class="titulo">
            <h1> DC <em> WARS </em></h1>
            <h2>
                <?php 
                    echo $_SESSION['heroe'].' vs '.$_SESSION['villano'];
                ?>
            </h2>
        </div>
        <div class="contenedor-heroe">
            <img src="img/superman.png" alt="">
        </div>
        
        <div class="contenedor-villano">
            <img src="img/zod.png" alt="Imagen general Zod">
        </div>
        <div class="contenedor-partida">
        <?php
            if(isset($_POST['valorAtaque'])){
                    if($_POST['valorAtaque'] == 1){
                        if($_SESSION['contAtacante']%2 == 0) {
                            $injury = $superman->ataqueHeroe();
                            if($injury > 0){
                                $zod->setResistencia($injury);
                            } else {
                                echo '<h3>No hay daños ',$_SESSION['heroe'],'. Prepárate para recibir un ataque.</h3>';
                            } 
                        } else if($_SESSION['contAtacante']%2 == 1) {
                            $injury = $zod->ataqueVillano();
                            if($injury > 0){
                                $superman->setResistencia($injury);
                            } else {
                                echo '<h3>No hay daños ',$_SESSION['villano'],'. Prepárate para recibir un ataque.</h3>';
                            }
                            
                        }
                        $_SESSION['contAtacante']++;
                        ?>
                            <div class="contenedor-vida">
                                <div class="vida-Heroe">
                                    <h3> Resistencia </h3>
                                    <h3 class="valor-Vida"> <?php echo $superman->getResistencia(); ?> </h3>
                                </div>
                            <div class="vida-Villano">
                                <h3> Resistencia </h3>
                                <h3 class="valor-Vida"> <?php echo $zod->getResistencia(); ?> </h3>
                            </div>
                            </div>
                            <div class="bt-ataque">
                                <form action="index2.php" method="POST">
                                    <input type="hidden" name="valorAtaque" value="1">
                                    <button type="submit" class="bt-select"> ATACAR </button>
                                </form>
                            </div>
                        <?php
                    
                }
            } else if(isset($_POST['valorInicio'])){
                if ($_POST['valorInicio'] == 1){
                    $jugadorInicio = rand(1, 10);
                    if($jugadorInicio >= 1 && $jugadorInicio <=5){
                        $_SESSION['contAtacante'] = 0;
                        echo '<h2 style="color: blue;">Inicia la partida ',$superman->getResistencia(),'</h2>';
                    } else {
                       echo '<h2 style="color: red;">Inicia la partida ',$zod->getResistencia(),'</h2>';
                       $_SESSION['contAtacante'] = 1;
                    }
                ?>
                <div class="contenedor-vida">
                <div class="vida-Heroe">
                    <h3> Resistencia </h3>
                    <h3 class="valor-Vida"> <?php echo $superman->getResistencia(); ?> </h3>
                </div>
                <div class="vida-Villano">
                    <h3> Resistencia </h3>
                    <h3 class="valor-Vida"> <?php echo $zod->getResistencia(); ?> </h3>
                </div>
            </div>
            <div class="bt-ataque">
                <form action="index2.php" method="POST">
                    <input type="hidden" name="valorAtaque" value="1">
                    <button type="submit" class="bt-select"> ATACAR </button>
                </form>
            </div>
            <?php
                }
            } else {
                
        ?>
            <h3> Iniciando combate entre <?php echo $_SESSION['heroe'].' vs '.$_SESSION['villano'];?></h3>
            <form action="index2.php" method="POST">
                <label>
                    <h4> Primero debes escoger quién atacará primero. ¡Pulsa el botón!</h4>
                    <input type="hidden" name="valorInicio" value="1">
                    <button class="bt-select" type="submit"> Seleccionar </button>
                </label>
            </form>
        </div>
    </div>
</body>
</html>    
    
<?php  
    }
?>