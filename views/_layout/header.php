<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/colorbox.css" />
    <link rel="icon" href="<?=APP_ROOT?>/content/images/209457-200.png" />
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/main.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/jquery.colorbox.js"></script>
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<div id="website">
<header>
    <ul>

        <li><a href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/photoBox.png"></a></li>
        <li><a href="<?=APP_ROOT?>/">Home</a></li>
        <?php if ($this->isLoggedIn) : ?>
        <li><a href="<?=APP_ROOT?>/album">Albums</a></li>
        <li><a href="<?=APP_ROOT?>/album/create">Create Album</a></li>
        <li><a href="<?=APP_ROOT?>/album/search">Search</a></li>


        <?php else: ?>
        <li> <a href="<?=APP_ROOT?>/users/login">Login</a></li>
        <li> <a href="<?=APP_ROOT?>/users/register">Register</a></li>
        <?php endif; ?>
</ul>
</header>
</div>
        <?php if ($this->isLoggedIn) : ?>

            <div id="logged-in-info">
             <span>Hello, <b><?=htmlspecialchars($_SESSION['name'])?></b></span>
                <form method="post" action="<?=APP_ROOT?>/users/logout">
                    <input type="submit" value="Logout"/>
                </form>
            </div>

        <?php endif; ?>


<?php require_once('show-notify-messages.php'); ?>
