<?php 
namespace App\Controllers;
use App\Models\AnnoncesModel;
use App\Models\PhotoModel;
use App\Models\EmailModel;

class AnnoncesController extends Controller{
    public function index(){
        $AnnoncesModel = new AnnoncesModel;
        $annonces = $AnnoncesModel->findAll();
        $PhotoModel = new PhotoModel;
        $EmailModel = new EmailModel;
        
        for($i=0;$i<count($annonces);$i++){
            $photos[$i] = $PhotoModel->find('photo','id_annonce',$annonces[$i]['id']);
            if(isset($photos[$i]['photo'])){
                $annonces[$i]['photo1']=$photos[$i]['photo'];
            }
            if(isset($annonces[$i]['id_email'])){
            $email[$i] = $EmailModel->find('email','id',$annonces[$i]['id_email']);
            if(isset($email[$i]['email'])){
            $annonces[$i]['email']=$email[$i]['email'];
            }
            }
            // if(isset($photos[$i]['photo'])){
            //     $annonces[$i]['photo1']=$photos[$i]['photo'];
            // }
        }
        
        //echo "<pre>",print_r($annonces),"</pre>";
        $this->twig->display('annonces.html.twig', compact("annonces"));
    }
}