<!-- display an album photos here -->

<?php
$this->title = "";
?>

<h1><?=htmlspecialchars($this->title)?></h1>


<!--upload photo-->
<form method="POST" action="<?=APP_ROOT?>/album/uploadPhoto" enctype="multipart/form-data" class="upload_photo_form">
    <label for="album_name">Upload photo</label>
    <input type="file" name="file_to_upload"  accept="image/*" class="custom-file-input"/>

    <input type="hidden" name="album_id_option"  value="<?=$this->album_id?>"/>
    <input type="hidden" name="redirect"  value="<?=APP_ROOT?>/album/view/<?=$this->album_id?>"/>

    <button class="button" type="submit" name="sumbit"> <span> Upload </span></button>
</form>


    <ul id="album-photos" data-albumid="<?=$this->album_id?>">
    <?php

    foreach ($this->albums as $photo) :

        $photo_name = htmlspecialchars($photo['photo_name']);

        if (mb_strlen($photo['photo_name']) > 15) {
            $photo_name = mb_substr($photo_name, 0, 15) . "..." . $photo['file_format'];
        }

        $thumbnails_file = APP_ROOT . THUMBNAILS_PATH . $photo['id'] . '.jpg';

        ?>
        <div class="photo_container">
            <li id="photo<?=$photo['id']?>" title="<?=$photo['photo_name']?>">

                <a class="color_box" href="<?=APP_ROOT?><?=PHOTOS_PATH . $photo['id'] . '.' . $photo['file_format']?>" > <img src='<?=$thumbnails_file?>'/></a>
                <h2 class="photo_name" > <?= $photo_name ?>
                    <span class="" onclick="deleteMultiple('<?=$photo['id']?>')"> <img id="delete" src='<?=APP_ROOT?><?=CONTENT ?>images/delete.png'> </span>
                     <input class="delete_checkbox" type="checkbox" name="multiple_delete" data-photoid="<?=$photo['id']?>">
                </h2>


            </li>
        </div>
    <?php endforeach ?>

</ul>

<button class="button" onclick="deleteMultiple()"> <span>Delete selected</span></button>