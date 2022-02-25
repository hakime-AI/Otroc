<?php
namespace App\Controllers;
use App\Models\AnnoncesModel;
use App\Models\PhotoModel;
use App\Models\EmailModel;

class UpdateController extends Controller{

    public function index(){
        $AnnoncesModel = new AnnoncesModel;
        $PhotoModel = new PhotoModel;
        $EmailModel = new EmailModel;

        $initAnnonce = $AnnoncesModel->findBy(['id'=>$_SESSION['param']['slug']]);
        $annonce = $initAnnonce[0];
        $photos = $PhotoModel->findBy(['id_annonce'=>$_SESSION['param']['slug']]);
        $email = $EmailModel->findBy(['id'=>$annonce['id_email']]);
        for($i=0;$i<5;$i++){
            $annonce['photo'.$i]=$photos[$i]['photo'];
        }
        $annonce['email']=$email[0]['email'];
        $this->twig->display('update.html.twig',compact('annonce'));
        
    }
}