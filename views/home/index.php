<?php $this->title = 'Latest Photos';


?>

<h1><?=htmlspecialchars($this->title)?></h1>

<ul>
    <?php foreach ($this->photos as $photo) :

        $thumbnails_file = "";

        if ($photo['id'] == null) {
            $thumbnails_file = APP_ROOT . THUMBNAILS_PATH . "no_image.jpg";
        }
        else{
            $thumbnails_file = APP_ROOT . THUMBNAILS_PATH . $photo['id'] . '.jpg';
        }

        $photo_name = htmlspecialchars($photo['photo_name']);

        if (mb_strlen($photo['photo_name']) > 15) {
            $photo_name = mb_substr($photo_name, 0, 15) . "..." . $photo['file_format'];
        }
        ?>
        <li id="photo<?=$photo?>">
            <a class="color_box" href="<?=APP_ROOT?><?=PHOTOS_PATH . $photo['id'] . '.' . $photo['file_format']?>" > <img src='<?=$thumbnails_file?>'/></a>

            <h2 class="photo_name"> <?=htmlspecialchars($photo_name) ?> </h2>

        </li>

    <?php endforeach ?>
</ul>