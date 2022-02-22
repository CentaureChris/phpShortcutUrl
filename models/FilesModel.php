<?php
class Files_model extends Driver{

    public function getFiles_query()
    {
        $sql = "SELECT * FROM files";
        $result = $this->getRequest($sql);
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
        $sql = "INSERT INTO files (files) VALUES (:file_name)";
        $param = ["file_name"=>$files->getFile_name()];
        $result = $this->getRequest($sql,$param);

        return $result;
    }

    public function deleteFile_query($id)
    {
        $sql = "DELETE FROM files WHERE id = $id";
        $result = $this->getRequest($sql);
        
        return $result;
    }
}