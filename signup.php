<?php
require 'header.php';
?>

    <!--/.nav-collapse -->


    <div class="container">
        <h1>Pokemon Battle</h1>

        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h2 class="text-center login-title">Sign up to create a trainer !</h2>

                <div class="account-wall">

                    <form class="form-signin" method="post" action="signup_treatment.php">
                        <input type="text" name="username" class="form-control" placeholder="Username" required
                               autofocus>
                        <input type="password" name="password" class="form-control" placeholder="Password" required
                               autofocus>
                        <button class="btn btn-lg btn-primary btn-block button_model_1" type="submit">Create a trainer</button>
                    </form>
                </div>
            </div>


        </div>
    </div>