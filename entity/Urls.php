<?php

class Urls {

    private $id;
    private $long_url;
    private $active;
    private $fk_user_id;
    private $count;
    

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
     * Get the value of long_url
     */ 
    public function getLong_url()
    {
        return $this->long_url;
    }

    /**
     * Set the value of long_url
     *
     * @return  self
     */ 
    public function setLong_url($long_url)
    {
        $this->long_url = $long_url;

        return $this;
    }

    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of fk_user_id
     */ 
    public function getFk_user_id()
    {
        return $this->fk_user_id;
    }

    /**
     * Set the value of fk_user_id
     *
     * @return  self
     */ 
    public function setFk_user_id($fk_user_id)
    {
        $this->fk_user_id = $fk_user_id;

        return $this;
    }

    /**
     * Get the value of count
     */ 
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set the value of count
     *
     * @return  self
     */ 
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }
}