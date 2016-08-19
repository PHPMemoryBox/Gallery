<?php $this->title = 'MemoryBox Gallery';

?>


<!-- Show albums when user is logged in -->

<h1><?=htmlspecialchars($this->title)?></h1>

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
                    <h2 class="album_name"> <?=htmlspecialchars($album['name']) ?> </h2>

                    <a href='<?=APP_ROOT?>/album/view/<?=$album['album_id']?>'> <img src='<?=$thumbnails_file?>'/></a>

                    <div class="date">

                        <i>Created on</i>
                        <?=(new DateTime($album['create_date']))->format('d-M-Y') ?>
                    </div>


                </li>

             <?php endforeach ?>
         </ul>
    </article>
</main>
