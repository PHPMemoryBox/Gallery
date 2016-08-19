<!-- display an album photos here -->

<?php
$this->title = "Post Title";
?>

<h1><?=htmlspecialchars($this->title)?></h1>

    <ul>


    <?php

    foreach ($this->albums as $photo) :

        $thumbnails_file = APP_ROOT . THUMBNAILS_PATH . $photo['id'] . '.jpg';

        ?>
        <li data-photoid="<?=$photo['id']?>" data-albumid="<?=$this->album_id?>">

            <a href='<?=APP_ROOT?><?=PHOTOS_PATH . $photo['id'] . '.' . $photo['file_format']?>'> <img src='<?=$thumbnails_file?>'/></a>

            <h2 class="photo_name"> <?=htmlspecialchars($photo['photo_name']) ?>
                <a href=''> <img src='<?=APP_ROOT?><?=CONTENT ?>images/delete.png'> </a>
            </h2>


        </li>

    <?php endforeach ?>

</ul>

