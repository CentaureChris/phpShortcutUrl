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

        $userId = trim(htmlspecialchars(addslashes($_SESSION['AuthId'])));
        $url->setFk_user_id($userId);

        $nb = $this->urls_m->insertUrls($url);
        if($nb) {
            header('location:index.php');
            exit();
        }
    }

    public function disableLink($id)
    {
       $this->urls_m->disableLink_query($id);
        header('location:index.php');
        exit();
    }
    
    public function enableLink($id)
    {
       $this->urls_m->enableLink_query($id);
        header('location:index.php');
        exit();
    }

    public function deleteUrl($id)
    {
        $this->urls_m->deleteUrl_query($id);
        header('location:index.php');
        exit();
    }

    public function count($id)
    {
        $id = $_GET['id'];
        $this->urls_m->count_url($id);
    }

    public function getUrlTest($id)
    {
        $id = $_GET['id'];
        $link = $this->urls_m->getUrl_query($id);
        $url = $link->fetch();
        header('location: '.$url['long_url'].'');
        exit();
    }
}