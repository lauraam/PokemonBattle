<?php


session_start();


$em = require __DIR__ . '/bootstrap.php';
require __DIR__ . '/functions.fn.php';



if (isset($_POST) && !empty($_POST)) {


    $trainerRepo = $em->getRepository('lauraam\PokemonBattle\Trainer');

    /** @var \Doctrine\ORM\EntityRepository $trainerRepo */
    /** @var \lauraam\PokemonBattle\Trainer $trainer */
    $trainer = $trainerRepo->findOneBy(['username' => $_POST['username'], 'password' => $_POST['password']]);

    if (is_object($trainer)){
        $_SESSION['id'] = $trainer->getId();
        $_SESSION['username'] = $trainer->getUsername();
        $_SESSION['password'] = $trainer->getPassword();
        $_SESSION['status'] = 'connected';


        header('Location:mypokemon.php');
    }
    else {
        $error = "Username or password is incorrect";
        echo $error;
    }
}

