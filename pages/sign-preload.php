<?php
if(isset($_SESSION['user']['logged'])){
    if($_SESSION['user']['type'] == 'Passenger'){
        header('location:index.php?home');
    }else{
        header('location:index.php?driver');
    }
}
?>
<main class="preview-overview">
    <div class="row">
        <div class="col m10 card-container">
            <div class="row">
                <div class="card col s10 m6">
                    <div class="card-content">
                        <h1 class="green-text center">MOVEFREE</h1>
                        <div class="center buttonGroup">
                            <p>
                                <a href="#signin" class="btn waves-ripple waves-effect signinbtn rightspace">Sign In</a>
                            </p>
                            <p>
                                <a href="#signUp" class="btn waves-ripple waves-effect signupbtn leftspace">Sign Up</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card col s10 m6 formOutline">
                    <div class="card-content">
                        <?php
                      require'signIn.php';
                      require 'signUp.php';
                      ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>