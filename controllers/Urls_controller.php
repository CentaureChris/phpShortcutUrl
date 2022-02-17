<?php

class Urls_controller
{

    private $urls_m;

    public function __construct()
    {
        $this->urls_m = new Urls_model();
    }

    public function getUrls()
    {
        AuthController::deniedAccess();
        $urls= $this->urls_m->getUrls_query();
        require_once('./views/tinyurls.php');
    }

    public function newUrls()
    {
        $url = new Urls();
        
        $longUrl = trim(htmlspecialchars(addslashes($_POST['longurl'])));
        $url->setLong_url($longUrl);

        $nb = $this->urls_m->insertUrls($url);
        if($nb) {
            header('location:index.php');
            exit();
        }
    }
    
}