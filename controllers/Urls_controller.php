<?php

class Urls_controller
{

    private $urls_m;
    private $files_m;

    public function __construct()
    {
        $this->urls_m = new Urls_model();
        $this->files_m = new Files_model();
    }

    public function getUrls()
    {
        AuthController::deniedAccess();
        $urls= $this->urls_m->getUrls_query();
        $files = $this->files_m->getFiles_query();
        require_once('./views/tinyurls.php');
    }

    public function disableLink($id)
    {
       $this->urls_m->disableLink_query($id);
        header('location:index.php');
        exit();
    }

    public function newUrls()
    {
        if(!empty($_POST['longurl'])){
            $url = new Urls();
        
            $longUrl = trim(htmlspecialchars(addslashes($_POST['longurl'])));
            $url->setLong_url($longUrl);
    
            $shortUrl = trim(htmlspecialchars(addslashes($_POST['shorturl'])));
            $url->setShort_url($shortUrl);
    
            $userId = trim(htmlspecialchars(addslashes($_SESSION['AuthId'])));
            $url->setFk_user_id($userId);
    
            $nb = $this->urls_m->insertUrls($url);
            header('location:index.php');
            exit();
        }
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

    public function newFile()
    {
        if(!empty($_FILES['file']['tmp_name'])){
            $file = new Files();
            $file_name = $_FILES['file']['name'];
            $file->setFile_name($file_name);
            $destination = "app/assets/files/";
            move_uploaded_file($_FILES['file']['tmp_name'], $destination . $file_name);
    
            $nb = $this->files_m->newFile_query($file);
            header('location: index.php');
            exit();
        }else{
            echo "<h4 class ='offset-4 col-4 text-center bg-danger text-white' >Please select a file to upload! </h4>";
        }
    }

    public function downloadFile($id)
    {
        $data = $this->files_m->getFile_query($id);
        // var_dump($data);
        $files = 'app/assets/files/'.$data['files'];
        
        if (file_exists($files)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($files).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($files));
            readfile($files);
            exit;
        }
    }

    public function deleteFile($id)
    {
        $this->files_m->deleteFile_query($id);
        header('location:index.php');
        exit();
    }
}