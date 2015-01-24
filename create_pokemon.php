<?php
require 'header.php';
?>


<div class="container">


    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h2 class="text-center login-title">Create a pokemon</h2>

            <div class="account-wall">

                <form class="form-signin" method="post" action="pokemon_treatment.php">
                    <input type="text" name="name" class="form-control" placeholder="Pokemon name" required
                           autofocus>
                    <select name="type" class="form-control" placeholder="Type" required
                           autofocus>
                        <option value="water">Water</option>
                        <option value="fire">Fire</option>
                        <option value="plant">Plant</option>
                           </select>


                    <p>Your pokemon has 100 HP by default</p>


                    <button class="btn btn-lg btn-primary btn-block button_model_2" type="submit">Create a pokemon</button>
                </form>
            </div>
        </div>


    </div>
</div>