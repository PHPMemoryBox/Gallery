<!-- display an album photos here -->

<?php
$this->title = "Post Title";
?>

<h1><?=htmlspecialchars($this->title)?></h1>

    <ul>


    <?php

    foreach ($this->album_photos as $photo) :

        $thumbnails_file = APP_ROOT . THUMBNAILS_PATH . $photo['id'] . '.jpg';

        ?>
        <li data-photoid="<?=$photo['id']?>" data-albumid="<?=$this->album_id?>">

            <h2 class="photo_name"> <?=htmlspecialchars($photo['photo_name']) ?> </h2>

            <a href='<?=APP_ROOT?><?=PHOTOS_PATH . $photo['id'] . '.' . $photo['file_format']?>'> <img src='<?=$thumbnails_file?>'/></a>

            <a href=''> <img src='<?=APP_ROOT?><?=CONTENT ?>images/delete.png'> </a>

        </li>

    <?php endforeach ?>

</ul>

