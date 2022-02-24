<?php
class Files_model extends Driver{

    public function getFiles_query()
    {
        $sql = "SELECT * FROM files WHERE user_id = :id";
        $param =['id' => $_SESSION['AuthId']];
        $result = $this->getRequest($sql,$param);
        $files = $result->fetchAll(PDO::FETCH_ASSOC);
        return $files;
    }

    public function getFile_query($id)
    {
        $sql = "SELECT * FROM files where id = $id";
        $result = $this->getRequest($sql);
        $files = $result->fetch(PDO::FETCH_ASSOC);
        return $files;
    }

    public function newFile_query(Files $files)
    {
        $sql = "INSERT INTO files (files,user_id) VALUES (:file_name,:user_id)";
        $param = ["file_name"=>$files->getFile_name(),
                    "user_id"=> $_SESSION['AuthId']
        ];
        try{
            $result = $this->getRequest($sql,$param);
            return $result;
        }catch(Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
    }


    public function deleteFile_query($id)
    {
        $sql = "DELETE FROM files WHERE id = $id";
        $result = $this->getRequest($sql);

        return $result;
    }
}