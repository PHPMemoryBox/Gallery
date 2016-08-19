<?php

class AlbumController extends BaseController
{
    public $albums = [];
    public $album_photos = [];
    public $album_id;

    //$user_albums -array with albums- calls GetAlbums function from model

    function index() {
        $user_albums = $this->model->GetAlbums($_SESSION['user_id']);

        $this->albums = $user_albums;
    }


	function view($id) {
        $this->album_photos = $this->model->AlbumPhotos($id);

        $this->album_id = $id;
    }
}
