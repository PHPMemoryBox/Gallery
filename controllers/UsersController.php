<?php

include_once('Mail.php');

class UsersController extends BaseController
{
    public function register()
    {
		if ($this->isPost) {

            //set variables
		    $email = $_POST['email'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $city = $_POST['city'];

            if($name=='' || $email=='' || $password==''|| $_POST['confirm_password']=='') {
                $this->addErrorMessage("Please fill all of the empty fields.");
            } else if (strlen($email) < 2 || !strpos($email, '@')){
                $this->addErrorMessage("Invalid email!");
            } else if (strlen($password) < 2 || strlen($password) > 50){
                $this->addErrorMessage("Invalid password lenght!");
            } else if (strlen($name) > 200) {
                $this->addErrorMessage("Invalid name length!");
            } else if ( $password != $_POST['confirm_password']) {
                $this->addErrorMessage("Password does not match.");
            } else if ($this->model->checkIfEmailExist($email)) {
                $this->addErrorMessage("Email already used.");
            } else if ($this->formValid()) {
                $userId = $this->model->register($email, $password, $name,  $city);

                if ($userId) {
                    $_SESSION['email'] = $email;
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['name'] = $name;

                    $this->addInfoMessage("Registration successful.");

                    //if registered send mail
                    $mail = new Gallery_Mail();
                    $mail->send($email, "register ok", "registrira se ok");

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

        if ($this->isPost) {

            if ((isset($_POST['email']) && isset($_POST['password']))
                && ($_POST['email'] && $_POST['password'])
            ) {

                $email = $_POST['email'];
                $password = $_POST['password'];
                $loggedUserId = $this->model->login($email, $password);

                if ($loggedUserId) {
                    $_SESSION['user_id'] = $loggedUserId['id'];
                    $_SESSION['name'] = $loggedUserId['name'];

                    return $this->redirect('home');
                } else {
                    $this->addErrorMessage("Wrong email or password!");
                }
            } else {
                $this->addErrorMessage("Enter email and password!");
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
