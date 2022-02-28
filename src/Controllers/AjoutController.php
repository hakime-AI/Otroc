<?php

namespace App\Controllers;

use App\Models\AnnoncesModel;
use App\Models\PhotoModel;
use App\Models\EmailModel;




class AjoutController extends Controller
{

    public function index()
    {

        $AnnonceModel = new AnnoncesModel;
        $PhotoModel = new PhotoModel;
        $EmailModel = new EmailModel;
        
        if (isset($_SESSION['param']['id'])) {


            $annonce = $AnnonceModel->findBy(['id' => $_SESSION['param']['id']]);
            print_r($annonce);

            // 
            $photos = $PhotoModel->findBy(['id_annonce' => $annonce[0]['id']]);

            for ($i = 1; $i <= count($photos); $i++) {
                $annonce[0]['photo' . $i] = $photos[$i - 1]['photo'];
            }

            $email = $EmailModel->find('email', 'id', $annonce[0]['id_email']);
            $annonce[0]['email'] = $email['email'];
            $annonce = $annonce[0];
            // echo '<pre>', print_r($email), '</pre>';
            // echo '<pre>', print_r($annonce), '</pre>';
        }
        //     if(isset($photos[$i]['photo'])){
        //         
        //     }
        //     if(isset($annonce[$i]['id_email'])){
        //     $email[$i] = $EmailModel->find('email','id',$annonce[$i]['id_email']);
        //     if(isset($email[$i]['email'])){
        //     $annonce[$i]['email']=$email[$i]['email'];
        //     }
        //     }
        // }
        // $this->twig->display('update.html.twig', compact("annonce"));

        // echo '<pre>', print_r($_SESSION['param']['slug']), '</pre>';
        // echo $_SESSION['param']['slug'];
        
            $this->twig->display('ajout.html.twig');
            if ($_POST) {
                require 'formulaireAjout.php';
            }
         
    }
}
