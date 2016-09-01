<?php

class HomeController extends BaseController
{
    function index()
    {

        if ($_SESSION != null) {
            $user_id = $_SESSION['user_id'];

            $this->photos = $this->model->showLatestPhotos($user_id);
        }
    }

    function view() {


    }

    function aboutUs() {

    }

}
