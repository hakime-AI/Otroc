<?php 
namespace App\Controllers;
use App\Models\AnnoncesModel;
use App\Models\PhotoModel;
use App\Models\EmailModel;

class AnnoncesController extends Controller{
    public function index(){
        $annoncesModel = new AnnoncesModel;
        $annonces = $annoncesModel->findAll();
        $PhotoModel = new PhotoModel;
        
        for($i=0;$i<count($annonces);$i++){
            $photos[$i] = $PhotoModel->find('photo','id_annonce',$annonces[$i]['id']);
            if(isset($photos[$i]['photo'])){
                $annonces[$i]['photo1']=$photos[$i]['photo'];
            }
        }
        
        echo "<pre>",print_r($annonces),"</pre>";
        $this->twig->display('annonces.html.twig', compact("annonces"));
    }
}