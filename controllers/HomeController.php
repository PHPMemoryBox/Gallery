<?php

class HomeController extends BaseController
{
    function index() {

        $user_id = $_SESSION['user_id'];

        $this->photos = $this->model->showLatestPhotos($user_id);

    }

    public function view() {


    }

}
