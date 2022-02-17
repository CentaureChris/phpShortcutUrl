<?php

require_once ('./models/Driver.php');

require_once ('./entity/Urls.php');
require_once ('./entity/User.php');

require_once ('./controllers/Urls_controller.php');
require_once ('./controllers/AuthController.php');
require_once ('./models/Urls_model.php');
require_once ('./models/AuthModel.php');


class Router{

    private $ctr_u;
    private $auth_ctr;
    private $page; 
    private $action; 


    public function __construct()
    {
        $this->ctr_u = new Urls_Controller();  
        $this->auth_ctr = new AuthController();
        $this->page = filter_input(INPUT_GET,"page");
        $this->action = filter_input(INPUT_GET,"action");
    }

    public function getPath()
    {
        switch($this->page){
            case "":
                $this->ctr_u->getUrls();
                if(isset($_POST['submit'])){
                    $this->ctr_u->newUrls();    
                }
                break;

            case "login":
                // $this->auth_ctr->getUsers();
                $this->auth_ctr->loginForm();
                if(isset($_POST['submit'])){
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    $this->auth_ctr->login($login,$pass);   
                }
                break;

            case "register":
                $this->auth_ctr->register();
                if(isset($_POST['submit'])){
                    $email = $_POST['email'];
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $this->auth_ctr->addUser($login,$pass);
                    }else{
                        echo "email non valide";
                    }
                }
                break;
            
            case "logout":
                $this->auth_ctr->logout();
                break;
        }
    }  
}