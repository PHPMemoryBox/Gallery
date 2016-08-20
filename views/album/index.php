<?php
$this->title = 'Albums'; ?>

<!-- show albums  -->

<h1><?=htmlspecialchars($this->title)?></h1>

<!--upload photo-->
<form method="POST" action="<?=APP_ROOT?>/album/uploadPhoto" enctype="multipart/form-data">
    <label for="album_name">Choose a file</label>
    <input type="file" name="file_to_upload"  accept="image/*" class="custom-file-input"/>

    <label for="album_id_option">Select album</label>
    <select name="album_id_option">
        <?php foreach ($this->albums as $album) :
            $album_name = htmlspecialchars($album['name']);
            echo "<option value ='" . $album['album_id'] . "'>" . $album_name . "</option>";

        endforeach ?>
    </select>

    <input type="hidden" name="redirect"  value="<?=APP_ROOT?>/album"/>
    <button class="btn" type="submit" name="sumbit"> Upload </button>
</form>



<main id="albums">
    <article>
        <ul>
            <?php foreach ($this->albums as $album) :

                $thumbnails_file = "";

                if ($album['photo_id'] == null) {
                    $thumbnails_file = APP_ROOT . THUMBNAILS_PATH . "no_image.jpg";
                }
                else{
                    $thumbnails_file = APP_ROOT . THUMBNAILS_PATH . $album['photo_id'] . '.jpg';
                }
                ?>
                <li>
                    <a href='<?=APP_ROOT?>/album/view/<?=$album['album_id']?>'> <img src='<?=$thumbnails_file?>' class="thumbnail"/></a>

                    <h2 class="album_name"> <?=htmlspecialchars($album['name']) ?> </h2>

                    <div class="date">

                        <i>Created on</i>
                        <?=(new DateTime($album['create_date']))->format('d-M-Y') ?>
                    </div>


                </li>

            <?php endforeach ?>
        </ul>

        <a href="<?=APP_ROOT?>/album/create"> Create new album</a>
    </article>
</main>

