<?php




session_start();



$em = require __DIR__ . '/bootstrap.php';
require __DIR__ . '/functions.fn.php';


 use lauraam\PokemonBattle\Trainer;



$trainer = new Trainer();

$trainer
->setUsername( $_POST['username'])
->setPassword($_POST['password'])
;

$em->persist($trainer);

$em->flush();

header('Location:mypokemon.php');