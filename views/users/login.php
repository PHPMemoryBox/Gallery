<?php $this->title = 'Login'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<header class="header">
    <span class="text"> LOGIN</span>
</header>

<form class="form" action="" method="POST">
    <input class="input" type="email" placeholder="Email" name="email">
    <input class="input" type="password" placeholder="Password" name="password">
    <button class="btn" type="submit">Go</button>

</form>
