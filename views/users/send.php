<?php $this->title = 'Contact Us'; ?>

<div id="contact">
    <h1><?= htmlspecialchars($this->title) ?></h1>

    <div class="container">
<from action='' method='post'>
    <label for='name'> Your Name: </label>
        <input type='text' required name='name' id='name' class="write_field" maxlength="50" <?php if (isset($_POST['name'])) {echo 'value =' . "'" . $_POST['name'] . "'";} ?>/><br>

        <label for='email' >Email Address: </label>
        <input type='email' required name='email' id='email' class="write_field" maxlength="50" <?php if (isset($_POST['email'])) {echo 'value =' . "'" . $_POST['email'] . "'";} ?> />

    <div>Message:</div>
    <textarea rows="10" cols="50" c name="message"></textarea><br><br><br>
    <input type="submit" value="Send">
    <a href="<?=APP_ROOT?>/home">[Cancel]</a></div>
</from>
</div>
</div>
