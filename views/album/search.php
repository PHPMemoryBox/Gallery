<?php ?>

<div class="content">
<form action="<?=APP_ROOT?>/album/search" method="post" class="search_album_name" enctype="multipart/form-data">

    <img class="search" src="<?=APP_ROOT?>/content/images/search_icon_white.png">

    <input name="search" type="text" placeholder="Search album" results="5" class="write_field">
    <button class="button" type="submit"><span> Search </span></button><br>

</form>


    <main id="albums">
        <article>
            <ul>
                <?php
                if ($this->albums != null) {
                foreach ($this->albums as $album) :

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
                <?php } ?>
            </ul>

            <!--<a href="<?=APP_ROOT?>/album/create"> Create new album</a>-->
        </article>
    </main>




</div>
