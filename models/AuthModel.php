<?php

class AuthModel extends Driver {

    public function getUsers_query()
    {
        $sql = "SELECT * FROM users";
        $result = $this->getRequest($sql);
        return $result;
    }


    public function getUser_query($login)
    {
        $sql = "SELECT * FROM users WHERE login = :login  OR email = :login ";
        $param = ["login" => $login];
        $result = $this->getRequest($sql,$param);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if($user == true){
            return $user['pass'];
        }
    }

    public function login_query($login,$pass)
    {
        $sql = "SELECT * FROM users WHERE (login = :login AND pass = :pass) OR (email = :login AND pass = :pass) ";
        $param = [":login"=>$login,":pass"=>$pass];
        $res = $this->getRequest($sql,$param);
        return $res->rowCount();
    }

    public function addUser_query()
    {
        $email = $_POST['email'];
        $login = $_POST['login'];
        $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email,login,pass) VALUES (:email,:login,:pass)";
        $param = ["email"=>$email,"login"=>$login,"pass"=>$pass];
        $result = $this->getRequest($sql,$param);

        return $result;
    }
}