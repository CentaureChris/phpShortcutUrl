<?php

class Urls_model extends Driver{

    public function getUrls_query()
    {
        $sql = "SELECT * FROM urls";
        $result = $this->getRequest($sql);
        return $result;
    }

    public function insertUrls(Urls $urls)
    {
        $sql = "INSERT INTO urls (long_url) VALUES (:longurl)";
        $tparam = ["longurl"=>$urls->getLong_url()];
        $result = $this->getRequest($sql,$tparam);
        
        return $result;
    }
}