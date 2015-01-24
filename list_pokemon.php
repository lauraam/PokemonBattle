<?php
/* Lsite des pokémons */

session_start();

$em = require __DIR__ . '/bootstrap.php';
require __DIR__ . '/functions.fn.php';


/* Récupérer le pokémon */

/** @var \Doctrine\ORM\EntityRepository $pokemonRepo */
$pokemonRepo = $em->getRepository('lauraam\PokemonBattle\Pokemon');


/** @var \lauraam\PokemonBattle\Pokemon $pokemon */
$pokemon = $pokemonRepo->findAll();

require 'header.php';


/** @var \lauraam\PokemonBattle\Pokemon $var */


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
                    <th>Fight</th>
                </tr>
                </thead>
                <tbody>
                <!-- Single event in a single day -->
                <?php

                foreach ($pokemon as $var) {
                    /** @var \lauraam\PokemonBattle\Trainer $tr */
                    $tr = $var->getTrainer();
                    if ($tr->getId() != $_SESSION['id']){


                    ?>



                    <tr>
                        <td class="agenda-date" class="active" rowspan="1">
                            <div class="dayofmonth"><?php echo $var->getName(); ?></div>


                        </td>
                        <td class="agenda-time">
                            <?php

                            if ($var->getType() == "0")
                                echo "Water";
                            elseif ($var->getType() == "1")
                                echo "Fire";
                            elseif ($var->getType() == "2")
                                echo "Plant";
                            ?>
                        </td>
                        <td class="agenda-events">
                            <div class="agenda-event">
                                <?php echo $var->getHp(); ?>
                            </div>
                        </td>

                        <td class="agenda-events">
                            <a class="btn btn-lg btn-primary btn-block button_trainer button_model_3" href="fight.php?id=<?php echo $var->getId(); ?>">Fight !</a>

                        </td>
                    </tr>
                <?php
                    }
                }?>


                </tbody>
            </table>
        </div>
    </div>
</div>


