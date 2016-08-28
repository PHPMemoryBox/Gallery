<?php $this->title = 'Login'; ?>
<div id="login">


    <div class="container">
        <a href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/209457-200.png">
        <form method="POST">

            <h2>Welcome Back!</h2>
            <div class="form-input">
                <input class="write_field" type="email" placeholder="Email" name="email">
            </div>
            <div class="form-input">
                <input class="write_field" type="password" placeholder="Password" name="password">
            </div>

            <button class="button" type="submit"><span> Log in </span></button><br>

            <a class="login" href="#">Forget your Password?</a>

        </form>
    </div>
</div>
