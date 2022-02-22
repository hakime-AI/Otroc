<?php
namespace App\Models;

class PhotoModel extends Model
{   
    protected $id;
    protected $id_annonce;
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

    public function getId_annonce()
    {
        return $this->id_annonce;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId_annonce($id_annonce)
    {
        $this->id_annonce = $id_annonce;

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
        return $this->photo2;
    }

    /**
     * Set the value of photo2
     *
     * @return  self
     */ 
    public function setphoto2($photo2)
    {
        $this->photo2 = $photo2;

        return $this;
    }

    public function getphoto3()
    {
        return $this->photo3;
    }

    /**
     * Set the value of photo3
     *
     * @return  self
     */ 
    public function setphoto3($photo3)
    {
        $this->photo3 = $photo3;

        return $this;
    }

    public function getphoto4()
    {
        return $this->photo4;
    }

    /**
     * Set the value of photo4
     *
     * @return  self
     */ 
    public function setphoto4($photo4)
    {
        $this->photo4 = $photo4;

        return $this;
    }

    public function getphoto5()
    {
        return $this->photo5;
    }

    /**
     * Set the value of photo5
     *
     * @return  self
     */ 
    public function setphoto5($photo5)
    {
        $this->photo5 = $photo5;

        return $this;
    }

}