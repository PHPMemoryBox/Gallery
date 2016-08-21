<?php

class AlbumController extends BaseController
{
    /*This function will be executed when the class is instantiated. It is a function that initializes base data and operations,
    which are needed for the class to function normally.*/
    function  onInit () {
        //comes from the base controller class, and is used to authorize the client
        // as a logged in user.
        $this->authorize();
    }

    //listing albums
    public function index(){
        $this->albums = $this->model->getAll($_SESSION['user_id']);

    }

    public function create() {
        if ($this->isPost) {
            $name = $_POST['album_name'];
            if (strlen($name) < 1) {
                $this->addErrorMessage("Title cannot be empty!");
            } else if ($this->model->checkIfAlbumExist($name, $_SESSION['user_id'])) {
                $this->addErrorMessage("Album with that name already exist!");
            } else {
                if ($this->model->create($name, $_SESSION['user_id'])) {
                    $this->addInfoMessage("Album " . $name . "created!");
                    $this->redirect('album');
                } else {
                    $this->addErrorMessage('Cannot create album');
                }
            }

        }
    }

    public function edit() {

    }

    public function deletePhoto($photoid, $albumid) {

        $file_info = $this->model->getPhotoFileInfo($photoid);

        $target_dir = CWD . PHOTOS_PATH;
        $thumbnail_dir = CWD . THUMBNAILS_PATH;

        $target_file = $target_dir . $photoid . '.' . $file_info["file_format"];
        $thumbnails_file = $thumbnail_dir . $photoid . '.' . "jpg";


        if (unlink($thumbnails_file) && unlink($target_file)) {
            $this->model->deletePhoto($photoid, $albumid);
        }
    }

    public function deletePhotoMultiple() {
        $albumid = $_POST['albumid'];
        $photoids = $_POST['photoid'];

        foreach ($photoids as $photoid) {
            $this->deletePhoto($photoid, $albumid);
        }

        echo json_encode($photoids); exit;
    }

    public function delete() {

        $albumid = $_POST['albumid'];



        if ($this->isPost) {
            $photos = [];
            $photos = $this->model->albumPhotos($albumid);


            //delete photos from album
            foreach ($photos as $photo) {
                $this->deletePhoto($photo['photo_id'], $albumid);
            }

            if ($this->model->delete($albumid)) {
                $this->addInfoMessage("Album deleted");
            } else {
                $this->addErrorMessage("Error: cannot delete album.");
            }

        } else {
                exit;
           //$album = $this->model->getById($_POST['id']);
            //if (!$album) {
            //    $this->addErrorMessage('Album does not exist!');
            //    $this->redirect('album');
            //}
            //$this->album= $album;

        }

        echo $albumid; exit;
    }

    public function view($id) {
        $this->albums = $this->model->AlbumPhotos($id);

        $this->album_id = $id;
    }

    public function uploadPhoto () {
        //var_dump($_FILES);exit;
        //upload picture file
        if (isset($_FILES['file_to_upload'])) {
            $uploadOk = 1;

            // Check file size
            if ($_FILES["file_to_upload"]["size"] > 5000000) {
                $this->addErrorMessage("Sorry, your file is too large.");
                $uploadOk = 0;
            }
            // Allow certain file formats
            $fileType = mime_content_type($_FILES["file_to_upload"]["tmp_name"]);

            $imageFileType = explode('/', $fileType);
            $imageFileType = end($imageFileType);

            if (!in_array($imageFileType, array("jpg", "jpeg", "png", "gif", "bmp"))) {
                $this->addErrorMessage("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
               $this->addErrorMessage("Select a file.");

            // if everything is ok, try to upload file
            } else {
                $file_name = $_FILES["file_to_upload"]["name"];

                $file_inserted_id = $this->model->uploadPhoto($file_name, $_SESSION['user_id'] ,$imageFileType);

                $target_file = CWD . PHOTOS_PATH . $file_inserted_id . '.' . $imageFileType;
                $thumbnail_file = CWD . THUMBNAILS_PATH . $file_inserted_id . '.' . "jpg";

                if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {

                    //create thumbnail
                    $cmd = CWD . CONTENT . "/imagemagic/" . "convert.exe " . $target_file ." -thumbnail 300 " . $thumbnail_file;
                    exec($cmd);

                    //add to DB
                    $addToDB = $this->model->addToConnectionTable($_POST['album_id_option'], $file_inserted_id);
                    if ($addToDB) {
                        $this->addInfoMessage("Photo " . $_FILES['file_to_upload']['name'] . " was added.");
                    } else {
                        $this->addInfoMessage("Choose album.");
                    }
                } else {
                    $this->addInfoMessage("Error.");
                }
            }
        }else {
            $this->addInfoMessage("Sorry, there was an error uploading your file.");
        }


       header("Location:" . $_POST['redirect']);
    }
}