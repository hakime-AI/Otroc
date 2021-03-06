<?php

namespace App\Controllers;

use App\Models\AnnoncesModel;
use App\Models\PhotoModel;
use App\Models\EmailModel;

class ShowController extends Controller
{
    public function index()
    {

        $AnnoncesModel = new AnnoncesModel;
        $PhotoModel = new PhotoModel;
        $EmailModel = new EmailModel;

        $initAnnonce = $AnnoncesModel->findBy(['id' => $_SESSION['param']['slug']]);
        $annonce = $initAnnonce[0];
        $photos = $PhotoModel->findBy(['id_annonce'=>$_SESSION['param']['slug']]);
        var_dump($photos);
        $email = $EmailModel->findBy(['id'=>$annonce['id_email']]);
        for($i=0;$i<5;$i++){
            $annonce['photo'.$i]=$photos[$i]['photo'];

        }
        $annonce['email'] = $email[0]['email'];

        // echo "<pre>",print_r($annonce),"</pre>";
        $this->twig->display('show.html.twig', compact("annonce"));
    }
}