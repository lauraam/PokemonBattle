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


/* Récupérer le pokémon adversaire */

/** @var \Doctrine\ORM\EntityRepository $pokemonRepo */
$pokemonRepo = $em->getRepository('lauraam\PokemonBattle\Pokemon');


/** @var lauraam\PokemonBattle\Pokemon $pokemon */
$pokemon = $pokemonRepo->find($_GET['id']);


/* Récupérer l'hp du pokémon adversaire */


$newHp =  100;





/* Gestion du temps (24h entre chaque restart) */

/* Récupérer le temps - actuel - */

$timeRestart = time();

$lastRestart = $pokemon->getRestart();

if ($timeRestart > $lastRestart + 60 * 60 * 24) {
    $pokemon->setHp($newHp);
    $pokemon->setRestart($timeRestart);
}









$em->flush();


require 'header.php';

?>


    <h2 class="text-center login-title">Your pokemon is now 100hp</h2>

<?php

if ($timeRestart < $lastRestart + 60 * 60 * 24) {



echo '<h1 class="text-center title">You can restart only 1 time per 24 hours</h1>';
}





