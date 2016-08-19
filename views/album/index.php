<?php
$this->title = 'Albums'; ?>

<!-- show albums  -->

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
                    <a href='<?=APP_ROOT?>/album/view/<?=$album['album_id']?>'> <img src='<?=$thumbnails_file?>'/></a>

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
