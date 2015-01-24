<?php

/* Récupérer et afficher le pokémon */

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

require 'header.php';


if (is_object($pokemon)){

    ?>





<div class="container">


    <div class="agenda">
        <div class="table-responsive">
            <table class="table table-condensed table-bordered">
                <thead>
                <tr>
                    <th>Pokemon</th>
                    <th>Type</th>
                    <th>Hp</th>
                </tr>
                </thead>
                <tbody>
                <!-- Single event in a single day -->
                <tr>
                    <td class="agenda-date" class="active" rowspan="1">
                        <div class="dayofmonth"><?php echo $pokemon->getName(); ?></div>


                    </td>
                    <td class="agenda-time">
                    <?php
                    if ($pokemon->getType() == "0")
                        echo "Water";
                    elseif ($pokemon->getType() == "1")
                        echo "Fire";
                    elseif ($pokemon->getType() == "2")
                        echo "Plant";
                    ?>
                    </td>
                    <td class="agenda-events">
                        <div class="agenda-event">
                             <?php echo $pokemon->getHp();?>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php

}
else
 echo '<button class="btn btn-lg btn-primary btn-block button_trainer" type="submit"><a href="create_pokemon.php">Create a pokemon</a></button>';





