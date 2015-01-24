<?php
require 'header.php';
?>


    <div class="container">
        <h1>Pokemon Battle</h1>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h2 class="text-center login-title">Sign in as a trainer !</h2>
                <div class="account-wall">

                    <form class="form-signin" method="post" action="login.php">
                        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                        <input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
                        <button class="btn btn-lg btn-primary btn-block button_model_2" type="submit">Sign in</button>
                    </form>
                </div>
                <a class="btn btn-lg btn-primary btn-block button_trainer button_model_1" href="signup.php">Sign up</a>
            </div>



        </div>
    </div><?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 20/01/15
 * Time: 19:22
 */ 