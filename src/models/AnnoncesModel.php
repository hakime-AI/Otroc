<?php
namespace App\Models;

class AnnoncesModel extends Model
{   
    protected $id;
    protected $nom;
    protected $description;
    protected $prix;
    protected $id_email;

    public function __construct()
    {
        $this->table = 'annonces';
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
     * Get the value of nom
     */ 
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getprix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    public function getid_email()
    {
        return $this->id_email;
    }

    /**
     * Set the value of id_email
     *
     * @return  self
     */ 
    public function setid_email($id_email)
    {
        $this->id_email = $id_email;

        return $this;
    }

}

