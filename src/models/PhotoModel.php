<?php
namespace App\Models;

class PhotoModel extends Model
{   
    protected $id;
    protected $id_annonce;
    protected $photo;

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
     * Get the value of photo
     */ 
    public function getphoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setphoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }
}