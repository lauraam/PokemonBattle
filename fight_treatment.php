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


/* Récupérer le pokémon adversaire */

/** @var \Doctrine\ORM\EntityRepository $pokemonAdvRepo */
$pokemonAdvRepo = $em->getRepository('lauraam\PokemonBattle\Pokemon');


/** @var lauraam\PokemonBattle\Pokemon $pokemonAdv */
$pokemonAdv = $pokemonAdvRepo->find($_GET['id']);

/* Récupérer l'hp du pokémon adversaire */

$hp = $pokemonAdv->getHp();

/* Si le combat est entre un pokémon feu et un pokémon plante, le pokémon feu peut infliger un dégat entre 10 et 20  */


if (($pokemonAdv->getType() == \lauraam\PokemonBattle\Pokemon::TYPE_FIRE) &&

    ($pokemonAdv->getType() == \lauraam\PokemonBattle\Pokemon::TYPE_PLANT)
) {
    $newHp = $hp - rand(10, 20);
} /* Si le combat est entre un pokémon feu et un pokémon plante, le pokémon feu peut infliger un dégat entre 5 et 30  */


elseif (($pokemonAdv->getType() == \lauraam\PokemonBattle\Pokemon::TYPE_FIRE) &&
    ($pokemonAdv->getType() == \lauraam\PokemonBattle\Pokemon::TYPE_WATER)
) {
    $newHp = $hp - rand(5, 30);
} else
    $newHp = $hp - rand(10, 20);


/* Si le hp est inférieur à 0, il devient égal à 0  */
if ($newHp < 0) {
    $newHp = 0;
}


/* Gestion du temps (6h entre chaque attaque) */

/* Récupérer le temps - actuel - */

$timeFight = time();

$lastFight = $pokemon->getTimeFight();

if ($timeFight > $lastFight + 60 * 60 * 6) {
    $pokemonAdv->setHp($newHp);
    $pokemon->setTimeFight($timeFight);
}





$em->flush();


require 'header.php';

?>

    <div class="center">
        <div class="container-fluid well span6">
            <div class="row-fluid">
                <div class="span2">
                    <img class="img_size" src="" class="img-circle">
                </div>

                <div class="span8">
                    <h3>My pokemon</h3>
                    <h6>Name : <?php echo $pokemon->getName(); ?></h6>
                    <h6>Type : <?php echo $pokemon->getType(); ?></h6>
                    <h6>Hp : <?php echo $pokemon->getHp(); ?></h6>
                </div>


            </div>
        </div>

        <h2 id="versus">VS</h2>

        <div class="container-fluid well span6">
            <div class="row-fluid">
                <div class="span2">
                    <img src="" class="img-circle">
                </div>

                <div class="span8">
                    <h3>My opponent's pokemon</h3>
                    <h6>Name : <?php echo $pokemonAdv->getName(); ?></h6>
                    <h6>Type : <?php echo $pokemonAdv->getType(); ?></h6>
                    <h6 class="newHp">New Hp : <?php echo $newHp; ?></h6>

                </div>


            </div>
        </div>
    </div>

    <button type="submit" action="fight_treatment.php?id=<?php echo $pokemonAdv->getId(); ?>" name="fight" value="fight"
            class="btn btn-lg btn-primary btn-block button_trainer button_model_1">Fight !
    </button>

<?php
if ($pokemon->getHp() == 0) {
    echo '<a href="restart.php?id=' . $pokemon->getId() . '" class="margin_top button_model_2 btn btn-lg btn-primary btn-block button_trainer">RESTART</a>';


}
if ($timeFight < $lastFight + 60 * 60 * 6) {



echo '<h1 class="text-center title">You can attack only 1 time per 6 hours</h1>';
}




