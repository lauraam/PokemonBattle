<?php
session_start();

$em = require __DIR__ . '/bootstrap.php';
require __DIR__ . '/functions.fn.php';

/* Récupérer le trainer */

/** @var \Doctrine\ORM\EntityRepository $trainerRepo */
$trainerRepo = $em->getRepository('lauraam\PokemonBattle\Trainer');


/** @var  $trainer */
$trainer = $trainerRepo->findOneBy(['username' =>
    $_SESSION['username']]);

/* Récupérer le pokémon */

/** @var \Doctrine\ORM\EntityRepository $pokemonRepo */
$pokemonRepo = $em->getRepository('lauraam\PokemonBattle\Pokemon');



/** @var \lauraam\PokemonBattle\Pokemon $pokemon */
$pokemon = $pokemonRepo->findOneBy(['trainer' => $trainer]);






/* Récupérer le pokémon de l'adversaire */

/** @var \Doctrine\ORM\EntityRepository $pokemonAdvRepo */
$pokemonAdvRepo = $em->getRepository('lauraam\PokemonBattle\Pokemon');


/** @var lauraam\PokemonBattle\Pokemon $pokemonAdv  */
$pokemonAdv = $pokemonAdvRepo->find($_GET['id']);











require 'header.php';

?>

<div class="center">
    <div class="container-fluid well span6">
    <div class="row-fluid">
        <div class="span2" >
            <img class="img_size" src="" class="img-circle">
        </div>

        <div class="span8">
            <h3>My pokemon</h3>
            <h6>Name : <?php echo $pokemon->getName();?></h6>
            <h6>Type : <?php echo $pokemon->getType();?></h6>
            <h6>Hp : <?php echo $pokemon->getHp();?></h6>
        </div>


    </div>
</div>

<h2 id="versus">VS</h2>

<div class="container-fluid well span6">
    <div class="row-fluid">
        <div class="span2" >
            <img src="" class="img-circle">
        </div>

        <div class="span8">
            <h3>My opponent's pokemon</h3>
            <h6>Name : <?php echo $pokemonAdv->getName();?></h6>
            <h6>Type : <?php echo $pokemonAdv->getType();?></h6>
            <h6>Hp : <?php echo $pokemonAdv->getHp();?></h6>

        </div>


    </div>
</div>
</div>

<a type="submit" href="fight_treatment.php?id=<?php echo $pokemonAdv->getId(); ?>" name="fight" value="fight" class="button_model_1 btn btn-primary btn-round-lg btn-lg">Fight !</a>

