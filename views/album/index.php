<?php
$this->title = ''; ?>

<div class="content">

<!-- show albums  -->

<h1> <?=htmlspecialchars($this->title)?> </h1>

<!--upload photo-->
    <div id="album">
        <form method="POST" action="<?=APP_ROOT?>/album/uploadPhoto" enctype="multipart/form-data" class="upload_photo_form">
            <label for="album_name"> Upload photo</label>
            <input class="write_field" type="file" name="file_to_upload"  accept="image/*" class="custom-file-input"/>

            <label for="album_id_option">Select album</label>
            <select name="album_id_option">
                <?php foreach ($this->albums as $album) :
                    $album_name = htmlspecialchars($album['name']);
                    echo "<option value ='" . $album['album_id'] . "'>" . $album_name . "</option>";

                endforeach ?>
            </select>

            <input type="hidden" name="redirect"  value="<?=APP_ROOT?>/album"/>
            <button class="button" type="submit" name="sumbit"> <span> Upload </span></button>
        </form>
    </div>


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
                <li id="album<?=$album['album_id']?>">
                    <a class="album" href='<?=APP_ROOT?>/album/view/<?=$album['album_id']?>'> <img src='<?=$thumbnails_file?>' class="thumbnail"/></a>

                    <h2 class="album_name"> <?=htmlspecialchars($album['name']) ?> </h2>

                    <div class="date">

                        <i>Created on</i><br/>
                        <?=(new DateTime($album['create_date']))->format('d-M-Y') ?>
                       <span onclick="deleteAlbum('<?=$album['album_id']?>')"> <img id="delete" src='<?=APP_ROOT?><?=CONTENT ?>images/delete.png'> </span>

                    </div>


                </li>

            <?php endforeach ?>
        </ul>

        <!--<a href="<?=APP_ROOT?>/album/create"> Create new album</a>-->
    </article>
</main>

</div>
