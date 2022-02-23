<?php
namespace App\Controllers;
use App\Models\AnnoncesModel;
use App\Models\PhotoModel;
use App\Models\EmailModel;
class ShowController extends Controller{
    public function index(){
        $AnnoncesModel = new AnnoncesModel;
        $initAnnonce = $AnnoncesModel->findBy(['id'=>$_SESSION['param']['slug']]);
        $annonce = $initAnnonce[0];
        $PhotoModel = new PhotoModel;
        $photos = $PhotoModel->findBy(['id_annonce'=>$_SESSION['param']['slug']]);
        $EmailModel = new EmailModel;
        $email = $EmailModel->findBy(['id'=>$annonce['id_email']]);
        $result =array_merge($annonce,$photos,$email);
        
        echo "<pre>",print_r($result),"</pre>";
        $this->twig->display('show.html.twig',compact("result"));
        
    }
}