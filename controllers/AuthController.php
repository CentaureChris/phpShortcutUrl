<?php
session_start();
class AuthController{

    private $auth_mdl;

    public function __construct()
    {
        $this->auth_mdl = new AuthModel();
    }

    public function loginForm()
    {
        require_once('./views/loginForm.php');
    }

    public function register()
    {
        require_once('./views/register.php');
    }


    public function login($login,$pass)
    {
        if((($login) == null || ($login) == "")|| (($pass) == null || ($pass) == ""))
        {
            echo "<h3 class ='offset-4 col-4 text-center bg-danger text-white' >You forget a champ !</h3>";
        }else{
            $login = $this->auth_mdl->getUser_query($login);
            // $res = $this->auth_mdl->login_query($login,$pass);
            
            if($login == true && password_verify($pass,$login['pass']) == 1){
                $_SESSION['Auth'] = $_POST['login'];
                $_SESSION['AuthId'] = $login['id'];
                header('Location: index.php');
                exit();
            }else{
                echo "<h3 class ='offset-4 col-4 text-center bg-danger text-white' >Login et/ou mot de passe incorrect!</h3>";
                // var_dump($pass);
                // var_dump($login);
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['Auth'],$_SESSION['AuthId']);
        header('Location: index.php?page=login');
        exit();
    }

    public function getUsers()
    {
        $users = $this->auth_mdl->getUsers_query();
        require_once('./views/loginForm.php');
    }

    public function addUser()
    {
        $user = new User();

        $email = trim(htmlspecialchars(addslashes($_POST['email'])));
        $user->setEmail($email);
        
        $login = trim(htmlspecialchars(addslashes($_POST['login'])));
        $user->setLogin($login);

        $pass = $_POST['pass'];
        $user->setPass($pass);

        $nb = $this->auth_mdl->addUser_query();
        if($nb) {
            header('Location: index.php');
            exit();
        }
    }

    public static function DeniedAccess()
    {
        if(!$_SESSION['Auth']){
            header(('Location: index.php?page=login'));
            exit();
        }
    }
}