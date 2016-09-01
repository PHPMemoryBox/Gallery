<?php $this->title = 'Register new user'; ?>

<div  id='register'>
    <img src="<?=APP_ROOT?>/content/images/209457-200.png">
    <h1><?= htmlspecialchars($this->title) ?></h1>

    <form action='' method='post'>
    <fieldset >

        <legend><h3>Register and save your memories for life.</h3></legend>
        <p>
            <label for='name'> Your Full Name: </label> <br>
            <input type='text' required name='name' id='name' class="write_field" maxlength="50" <?php if (isset($_POST['name'])) {echo 'value =' . "'" . $_POST['name'] . "'";} ?>/>
        </p>
        <p>
            <label for='email' >Email Address: </label> <br>
            <input type='email' required name='email' id='email' class="write_field" maxlength="50" <?php if (isset($_POST['email'])) {echo 'value =' . "'" . $_POST['email'] . "'";} ?> />
        </p>
        <p>
            <label for='password' >Password:</label> <br>
            <input type='password' required name='password' class="write_field" id='password' maxlength="50" />
        </p>
        <p>
            <label for='confirm_password' >Confirm Password:</label> <br>
            <input type='password' required name='confirm_password' class="write_field" id='confirm_password' maxlength="50" />
        </p>
        <p>
            <label for='city' > City: </label> <br>
            <input type='text' required name='city' id='city' class="write_field" maxlength="50" <?php if (isset($_POST['city'])) {echo 'value =' . "'" . $_POST['city'] . "'";} ?> />
        </p>

        <button class="button" type='submit' name='submit' > <span> Submit </span> </button>

    </fieldset>
</form>
</div>
