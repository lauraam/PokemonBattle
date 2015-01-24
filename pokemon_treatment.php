<?php
/* Page liée à la création du pokémon */
session_start();






$em = require __DIR__ . '/bootstrap.php';
require __DIR__ . '/functions.fn.php';

use lauraam\PokemonBattle\Pokemon;

/** @var \Doctrine\ORM\EntityRepository $trainerRepo */
$trainerRepo = $em->getRepository('lauraam\PokemonBattle\Trainer');

if (isConnected()){
    $pokemon = new Pokemon();
    $trainer = $trainerRepo->findOneBy(['username' => $_SESSION['username'], 'password' => $_SESSION['password']]);

    $pokemon
        ->setName( $_POST['name'])
        ->setHp(100)
        ->setTrainer($trainer)
        ->setTimeFight(0)
        ->setRestart(0);

    if($_POST['type'] == 'fire'){
        $pokemon->setType(Pokemon::TYPE_FIRE);
    }
    elseif($_POST['type'] == 'plant'){
        $pokemon->setType(Pokemon::TYPE_PLANT);
    }
    elseif
    ($_POST['type'] == 'water'){
        $pokemon->setType(Pokemon::TYPE_WATER);
    }


    ;

    $em->persist($pokemon);

    $em->flush();

    header('Location:mypokemon.php');

}

else{
    header('Location:signup.php');
}



