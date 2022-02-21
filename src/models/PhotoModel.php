<?php
namespace App\Models;

class PhotoModel extends Model
{   
    protected $id;
    protected $photo1;
    protected $photo2;
    protected $photo3;
    protected $photo4;
    protected $photo5;

    public function __construct()
    {
        $this->table = 'photo';
    }

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
     * Get the value of photo1
     */ 
    public function getphoto1()
    {
        return $this->photo1;
    }

    /**
     * Set the value of photo1
     *
     * @return  self
     */ 
    public function setphoto1($photo1)
    {
        $this->photo1 = $photo1;

        return $this;
    }

    public function getphoto2()
    {
        return $this->photo1;
    }

    /**
     * Set the value of photo1
     *
     * @return  self
     */ 
    public function setphoto2($photo1)
    {
        $this->photo1 = $photo1;

        return $this;
    }

    public function getphoto3()
    {
        return $this->photo1;
    }

    /**
     * Set the value of photo1
     *
     * @return  self
     */ 
    public function setphoto3($photo1)
    {
        $this->photo1 = $photo1;

        return $this;
    }

    public function getphoto4()
    {
        return $this->photo1;
    }

    /**
     * Set the value of photo1
     *
     * @return  self
     */ 
    public function setphoto4($photo1)
    {
        $this->photo1 = $photo1;

        return $this;
    }

    public function getphoto5()
    {
        return $this->photo1;
    }

    /**
     * Set the value of photo1
     *
     * @return  self
     */ 
    public function setphoto5($photo1)
    {
        $this->photo1 = $photo1;

        return $this;
    }

}