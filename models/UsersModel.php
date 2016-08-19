<?php

class UsersModel extends BaseModel
{
    public function login($email, $password){
        $sql = 'SELECT * FROM user where email = "' . $email . '" and password = "' . md5($password) . '"';
        $result = self::$db->query($sql);
        $user = $result->fetch_assoc();
        return $user;


        /*$statement = self::$db->prepare('SELECT * FROM user where email =?');
        $statement->bind_param('s',  $email);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();*/

        /*if (password_verify(md5($password), $result['password']))
            return $result['id'];
        return false;*/
    }

    public function register(string $email, string $password, string $name, string $city){

        //insert to DB
        $statement = self::$db->prepare("INSERT INTO user (name, email, password, city) VALUES (?, ?, ?, ?) ");
        $statement->bind_param("ssss", $name, $email, md5($password), $city);
        $statement->execute();

        if($statement->affected_rows != 1)
        {
            return false;
        }

        $user_id = self::$db->query('SELECT LAST_INSERT_ID()')->fetch_row()[0];
        return $user_id;
    }


    public function checkIfEmailExist($email) {
        $sql = 'SELECT * FROM user where email = "'.  $email . '"';

        $result = self::$db->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }
        else return false;
    }
}
