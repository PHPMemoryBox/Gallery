<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/colorbox.css" />
    <link rel="icon" href="<?=APP_ROOT?>/content/images/209457-200.png" />

    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/main.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/jquery.colorbox.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAA6YqcU_DEsqfdu7e4DNkXzZlRIauYNW0"></script>

    <!-- google maps -->
    <script>
        var myCenter=new google.maps.LatLng(42.666863, 23.352342);

        function initialize()
        {
            var mapProp = {
                center:myCenter,
                zoom:17,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var marker=new google.maps.Marker({
                position:myCenter,
            });

            marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>


    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<body>

<header>

    <ul id="header">
        <li><a href="<?=APP_ROOT?>/"><img src="<?=APP_ROOT?>/content/images/photoBox.png"></a></li>

        <?php if ($this->isLoggedIn) : ?>
        <li><a href="<?=APP_ROOT?>/">Home</a></li>
        <li><a href="<?=APP_ROOT?>/album">Albums </a></li>
        <li><a href="<?=APP_ROOT?>/album/create">Create Album</a></li>
        <li><a href="<?=APP_ROOT?>/album/search">Search Album</a></li>

        <?php else: ?>
        <li> <a href="<?=APP_ROOT?>/users/login">Login </a></li>
        <li> <a href="<?=APP_ROOT?>/users/register">Register </a></li>
        <?php endif; ?>
        <li><a href="<?=APP_ROOT?>/home/view">About us</a></li>
</ul>
</header>

        <?php if ($this->isLoggedIn) : ?>

            <div id="logged-in-info">
             <span>Hello, <b><?=htmlspecialchars($_SESSION['name'])?></b></span>
                <form method="post" action="<?=APP_ROOT?>/users/logout">
                    <button class="button" type="submit" value="Logout"> <span> Log out </span> </button>
                </form>
            </div>

        <?php endif; ?>


<?php require_once('show-notify-messages.php'); ?>
