<?php
$this->title = ''; ?>
<div id="search">
    <h1><?=htmlspecialchars($this->title)?></h1>

    <form action="" method="get" class="search_album_name">
        <img class="search" src="<?=APP_ROOT?>/content/images/search_icon_white.png">
        <input name="search" type="text" placeholder="Search album" results="5" class="write_field">
        <button class="button" type="submit"><span> Search </span></button><br>
        </form>

<!--    <main id="album">-->
<!--        <article>-->
<!--            <ul>-->
<!---->
<!--</ul>-->
<!--        </article>-->
<!--    </main>-->
    </div>