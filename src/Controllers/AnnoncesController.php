<?php 
namespace App\Controllers;
use App\Models\AnnoncesModel;
class AnnoncesController extends Controller{
    public function index(){
        $annoncesModel = new AnnoncesModel;
        $annonces = $annoncesModel->findAll();
        // $annoncesModel->setnom($annonces[0]['nom']);
        
        $this->twig->display('annonces.html.twig', compact("annonces"));
        // $newnom=$annoncesModel->getnom();
        // echo "<pre>",$newnom,"</pre>";
        
    }
}