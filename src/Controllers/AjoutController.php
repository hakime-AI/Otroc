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
            $initAnnonce = $AnnoncesModel->findBy(['id' => 35]);
            $annonce = $initAnnonce[0];
            $photos = $PhotoModel->findBy(['id_annonce' => 35]);
            $email = $EmailModel->findBy(['id' => $annonce['id_email']]);

            for ($i = 0; $i < 5; $i++) {
                $annonce['photo' . $i] = $photos[$i]['photo'];
            }
            $annonce['email'] = $email[0]['email'];

            // echo "<pre>",print_r($annonce),"</pre>";

            // on applique le template du mjml en remplacant par les valeurs poster de l'annonce
            // on stocke 
            //$renderer = BinaryRenderer(__DIR__ . '/node_modules/.bin/mjml');
            // require_once "formulaire.php";
            ob_start();
            $this->twig->display('mail.twig', compact('annonce'));
            $annonceHTML = ob_get_clean();
            
            // on transforme le template final en template html
            //$annonceHTML= $renderer->render($annonceMJML);

            $sujet = "mail de Validation/Update";
            $destinataire = $_POST['email'];
            $headers = 'Content-type: text/html; charset=iso-8859-1';
            mail($destinataire, $sujet, $annonceHTML, $headers);
            die;
            header('Location: ../Otroc');
        }
    }
}