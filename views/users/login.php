<?php $this->title = 'Login'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<header class="header">
    <span class="text"> Welcome Back!</span>
</header>

<form method="POST">
    <input class="write_field" type="email" placeholder="Email" name="email">
    <input class="write_field" type="password" placeholder="Password" name="password">
    <button class="button" type="submit"><span> Log in </span></button>

</form>
