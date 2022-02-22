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

    // function view($page,$variables=[])
    // {
    //     if(count($variables))
    //     {
    //         extract($variables);
    //     }
    //     require $page;
    // }

    public function login($login,$pass)
    {
        $login = $this->auth_mdl->getUser_query($login);
        // echo $login;
        // var_dump( password_verify($pass, $login) ) ;
        $res = $this->auth_mdl->login_query($login,$pass);
        $error="";
        if(password_verify($pass,$login['pass']) == 1){
            $_SESSION['Auth'] = $_POST['login'];
            $_SESSION['AuthId'] = $login['id'];
            header('Location: index.php');
            exit();
        }else{
            $error = "Login et/ou mot de pass incorrect!";
            require_once('./views/loginForm.php');
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