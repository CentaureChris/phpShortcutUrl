<?php

class Files {

    private $id;
    private $file_name;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Get the value of file_name
     */ 
    public function getFile_name()
    {
        return $this->file_name;
    }

    /**
     * Set the value of file_name
     *
     * @return  self
     */ 
    public function setFile_name($file_name)
    {
        $this->file_name = $file_name;

        return $this;
    }
}