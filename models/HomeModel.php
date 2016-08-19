<?php

class AlbumModel extends BaseModel
{
    // TODO: your database access functions for the home page will come here ...

    //return all user albums to show on home page
    function GetAlbums($user_id) //: array
    {
        $statement = self::$db->query("SELECT *,album.id as album_id FROM album LEFT JOIN album_photo on album.id=album_photo.album_id "
            . "Left JOIN photo on photo.id=album_photo.photo_id WHERE album.user_id={$user_id} GROUP BY album.id "
            . "ORDER BY create_date DESC, photo_id DESC");

        $albums = [];

        while ($album = $statement->fetch_assoc()) {

            $albums[] = $album;
        }

        return $albums;
    }

    function AlbumPhotos ($id) : array
    {
        $statement = self::$db->prepare('SELECT * FROM album JOIN album_photo on album.id=album_photo.album_id ' .
            ' JOIN photo on photo.id=album_photo.photo_id WHERE album.id=?');

        $statement->bind_param("s", $id);
        $statement->execute();
        $result = $statement->get_result();

        $photos = [];

        while ($photo = $result->fetch_assoc()) {
            $photos[] = $photo;
        }

        return $photos;
    }
}
