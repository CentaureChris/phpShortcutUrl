<?php

class Urls_model extends Driver{

    public function getUrls_query()
    {
        $sql = "SELECT * FROM urls WHERE fk_user_id = :id";
        $param = ['id' => $_SESSION['AuthId']];
        $result = $this->getRequest($sql,$param);
        $urls = $result->fetchAll(PDO::FETCH_ASSOC);
        return $urls;
    }

    public function getUrl_query($id)
    {
        $sql = "SELECT * FROM urls WHERE id = $id ";
        $result = $this->getRequest($sql);
        return $result;
    }

    public function insertUrls(Urls $urls)
    {
        $sql = "INSERT INTO urls (long_url,short_url,fk_user_id,count) VALUES (:longurl,:shorturl,:id,0)";
        $tparam = ["longurl"=>$urls->getLong_url(),
                    "shorturl"=>$urls->getShort_url(),
                    'id' => $_SESSION['AuthId']
                ];
        try{
            $result = $this->getRequest($sql,$tparam);
            return $result;
        }catch(Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
        
    }

    public function disableLink_query($id)
    {
        $sql = "UPDATE urls SET active = 0 WHERE id = :id";
        $param =['id' => $id];
        $res = $this->getRequest($sql,$param);

        return $res;
    }

    public function enableLink_query($id)
    {
        $sql = "UPDATE urls SET active = 1 WHERE id = :id";
        $param =['id' => $id];
        $res = $this->getRequest($sql,$param);

        return $res;
    }

    public function count_url($id)
    {
        $sql = "UPDATE urls SET count = count+1 WHERE id = $id";
        $res = $this->getRequest($sql);

        return $res;
    }

    public function deleteUrl_query($id)
    {
        $sql = "DELETE FROM urls WHERE id = $id";
        $res = $this->getRequest($sql);

        return $res;
    }
}

