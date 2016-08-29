<?php $this->title = 'Login'; ?>
<div id="login">
    <h1><?= htmlspecialchars($this->title) ?></h1>

    <div class="container">

        <img class="login" src="<?=APP_ROOT?>/content/images/209457-200.png">


            <form method="POST">

                <h2>Welcome Back!</h2>
                <div class="form-input">
                    <img class="login-user" src="<?=APP_ROOT?>/content/images/icon-user-name.png">
                    <input class="write_field" type="email" placeholder="Email" name="email">
                </div>
                <div class="form-input">
                    <img class="login-pass" src="<?=APP_ROOT?>/content/images/icon-pwd.png">
                    <input class="write_field" type="password" placeholder="Password" name="password">
                </div>

                <button class="button" type="submit"><span> Log in </span></button><br>

                <a class="login" href="#">Forget your Password?</a>

            </form>
    </div>
</div>