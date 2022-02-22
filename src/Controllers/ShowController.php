<?php
namespace App\Controllers;
use App\Models\AnnoncesModel;
use App\Models\PhotoModel;
class ShowController extends Controller{
    public function index(){
        $annoncesModel = new AnnoncesModel;
        $initAnnonce = $annoncesModel->findBy(['id'=>$_SESSION['param']['slug']]);
        $annonce = $initAnnonce[0];
        $PhotoModel = new PhotoModel;
        $photos = $PhotoModel->findBy(['id_annonce'=>$_SESSION['param']['slug']]);
        
        print_r($photos);
        print_r($_SESSION['slug']);
        $this->twig->display('show.html.twig',compact("annonce"),compact("photos"));
        
    }
}