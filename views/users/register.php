<?php $this->title = 'Register New User'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<form id='register' action='' method='post'>
    <fieldset >

        <legend><h1>Register</h1></legend>

        <label for='name'> Your Full Name: </label>
        <input type='text' required name='name' id='name' maxlength="50" <?php if (isset($_POST['name'])) {echo 'value =' . "'" . $_POST['name'] . "'";} ?>/>

        <label for='email' >Email Address: </label>
        <input type='email' required name='email' id='email' maxlength="50" <?php if (isset($_POST['email'])) {echo 'value =' . "'" . $_POST['email'] . "'";} ?> />

        <label for='password' >Password:</label>
        <input type='password' required name='password' id='password' maxlength="50" />

        <label for='confirm_password' >Confirm Password:</label>
        <input type='password' required name='confirm_password' id='confirm_password' maxlength="50" />

        <label for='city' > City: </label>
        <input type='text' required name='city' id='city' maxlength="50" <?php if (isset($_POST['city'])) {echo 'value =' . "'" . $_POST['city'] . "'";} ?> />

        <input class="button" type='submit' name='submit' value='Submit' />

    </fieldset>
</form>