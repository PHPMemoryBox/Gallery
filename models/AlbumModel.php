<?php

class AlbumModel extends BaseModel
{
    public function getAll($user_id) : array
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

    public function getAlbumById($id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM album WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function create(string $name, int $user_id) : bool
    {
        $stmt = self::$db->prepare("INSERT INTO album (name, user_id) VALUES (?,?) ");
        $stmt->bind_param("ss", $name, $user_id);
        $stmt->execute();

        return $stmt->affected_rows == 1;
    }

    public function delete(int $album_id) : bool
    {
        //check if album exist

        $statement = self::$db->prepare("DELETE FROM album WHERE id = ?");
        $statement->bind_param('i', $album_id);
        $statement->execute();

        return $statement->affected_rows == 1;
    }

    public function deletePhoto($photoid, $albumid) {

        $statement = self::$db->prepare('DELETE FROM photo WHERE id=?');
        $statement->bind_param("i", $photoid);
        $statement->execute();

        $statement = self::$db->prepare('DELETE FROM album_photo WHERE photo_id=? and album_id=?');
        $statement->bind_param("ss", $photoid, $albumid);
        $statement->execute();

    }

    public function getPhotoFileInfo($photo_id){

        $statement = self::$db->prepare('SELECT * FROM photo WHERE photo.id=?');
        $statement->bind_param("s", $photo_id);
        $statement->execute();

        $result = $statement->get_result();
        return  $result->fetch_assoc();

    }

    public function checkIfAlbumExist($name, $user_id) : bool
    {
        $sql = 'SELECT * FROM album where name = "' . $name . '" and user_id = "' . $user_id . '"';
        $result = self::$db->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
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

    public function uploadPhoto ($file_name, $user_id ,$imageFileType) {
        //insert information about photo in DB
        $stmt = self::$db->prepare("INSERT INTO photo (photo_name, user_id, file_format) VALUES (?, ?, ?) ");
        $stmt->bind_param("sss", $file_name, $user_id, $imageFileType);
        $stmt->execute();

        //return inserted id
        return $stmt->insert_id;
    }

    public function addToConnectionTable ($album_id, $file_inserted_id) : bool
    {
        //add info in connection table
        $statement = self::$db->prepare("INSERT INTO album_photo (album_id, photo_id) VALUES (?, ?) ");
        $statement->bind_param("ss", $album_id, $file_inserted_id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    function search ($name) : array
    {
        $statement = self::$db->query(
            "SELECT album.id, name, user_id ".
            "FROM album WHERE name LIKE 'search%' ");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }



}