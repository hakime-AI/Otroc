<?php 
namespace App\Controllers;
use App\Models\AnnoncesModel;
class AnnoncesController extends Controller{
    public function index(){
        $annoncesModel = new AnnoncesModel;
        $annonces = $annoncesModel->findAll();
        
        $this->twig->display('annonces.html.twig', compact("annonces"));
    }
}