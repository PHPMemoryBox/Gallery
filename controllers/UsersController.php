<?php

class UsersController extends BaseController
{
    public function register()
    {
		if ($this->isPost) {
            $city = $_POST['city'];

		    $email = $_POST['email'];
            $password = $_POST['password'];
            $name = $_POST['name'];

            if($_POST['name']=='' || $_POST['email']=='' || $_POST['password']==''|| $_POST['confirm_password']=='')
            {
                $this->addErrorMessage("Please fill all of the empty fields.");
            } else if (strlen($email) < 2 || !strpos($email, '@')){
                $this->addErrorMessage("Invalid email!");
            } else if (strlen($password) < 2 || strlen($password) > 50){
                $this->addErrorMessage("Invalid password!");
            } else if (strlen($name) > 200) {
                $this->addErrorMessage("Invalid name length!");
            } else if ( $_POST['password'] != $_POST['confirm_password']) {
                $this->addErrorMessage("Password does not match.");
            } else if ($this->model->checkIfEmailExist($email)) {
                $this->addErrorMessage("Email already used.");
            }

            else if ($this->formValid()) {
                $userId = $this->model->register($_POST['email'], $_POST['password'], $_POST['name'], $_POST['city']);
                if ($userId) {
                    $_SESSION['email'] = $email;
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['name'] = $name;

                    $this->addInfoMessage("Registration successful.");
                    $this->redirect('home');
                } else {
                    $this->addErrorMessage("User registration failed!");
                }
            }
        }


    }

    public function login()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        /* $message = "";

        //if (isset($_SESSION['user_id'])) {
        //    exit;
       // }

        if (isset($_POST['email'], $_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                return $this->redirect('album');
            } else {
                $message = "Incorrect email or password";
            }
        }

        $_SESSION['messages'] = $message; */

        if ($this->isPost && (isset($_POST['email']) && isset($_POST['password']))) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loggedUserId = $this->model->login($email, $password);

            if ($loggedUserId) {
                $_SESSION['user_id'] = $loggedUserId['id'];
                $_SESSION['name'] = $loggedUserId['name'];

                return $this->redirect('home');
            }
            else {
                $this->addErrorMessage("Error: login failed!");
            }
        }
    }

    public function logout()
    {
		session_destroy();
        $this->addInfoMessage("Logout successful");
        $this->redirect("");
    }
}
