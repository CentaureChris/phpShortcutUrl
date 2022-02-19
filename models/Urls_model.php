<?php

class Urls_model extends Driver{

    public function getUrls_query()
    {
        $sql = "SELECT * FROM urls WHERE fk_user_id = :id";
        $param = ['id' => $_SESSION['AuthId']];
        $result = $this->getRequest($sql,$param);
        return $result;
    }

    public function insertUrls(Urls $urls)
    {
        $sql = "INSERT INTO urls (long_url,fk_user_id) VALUES (:longurl,:id)";
        $tparam = ["longurl"=>$urls->getLong_url(),'id' => $_SESSION['AuthId']];
        $result = $this->getRequest($sql,$tparam);
        
        return $result;
    }
}