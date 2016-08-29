<?php $this->title = 'Register new user'; ?>
<div  id='register'>
<h1><?= htmlspecialchars($this->title) ?></h1>
<div class="container">
<form action='' method='post'>


        <h3>Register and save your memories for life.</h3>

        <label for='name'> Your Full Name: </label>
        <input type='text' required name='name' id='name' class="write_field" maxlength="50" <?php if (isset($_POST['name'])) {echo 'value =' . "'" . $_POST['name'] . "'";} ?>/><br>

        <label for='email' >Email Address: </label>
        <input type='email' required name='email' id='email' class="write_field" maxlength="50" <?php if (isset($_POST['email'])) {echo 'value =' . "'" . $_POST['email'] . "'";} ?> />

        <label for='password' >Password: </label>
        <input type='password' required name='password' class="write_field" id='password' maxlength="50" /><br>

        <label for='confirm_password' >Confirm Password:</label>
        <input type='password' required name='confirm_password' class="write_field" id='confirm_password' maxlength="50" />

        <label for='city' > City: </label>
        <input type='text' required name='city' id='city' class="write_field" maxlength="50" <?php if (isset($_POST['city'])) {echo 'value =' . "'" . $_POST['city'] . "'";} ?> /><br>

        <button class="button" type='submit' name='submit' > <span> Submit </span> </button>


</form>
</div>
</div>