<?php
namespace App\Controllers;

use App\Models\AnnoncesModel;
use App\Models\PhotoModel;
use App\Models\EmailModel;





class AjoutController extends Controller{
    
    public function index(){

        $AnnoncesModel = new AnnoncesModel;
        $PhotoModel = new PhotoModel;
        $EmailModel = new EmailModel;
        
        $this->twig->display('ajout.html.twig');

        if ($_POST) {
            require 'formulaire.php';            
            header('Location: ../Otroc');
        }
    }
}