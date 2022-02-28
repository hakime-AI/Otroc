<?php

namespace App\Controllers;



use App\Models\AnnoncesModel;
use App\Models\PhotoModel;
use App\Models\EmailModel;

class UpdateController extends Controller
{

    public function index()
    {
        $AnnoncesModel = new AnnoncesModel;
        $PhotoModel = new PhotoModel;
        $EmailModel = new EmailModel;

        $initAnnonce = $AnnoncesModel->findBy(['id' => $_SESSION['param']['slug']]);
        $annonce = $initAnnonce[0];
        $photos = $PhotoModel->findBy(['id_annonce' => $_SESSION['param']['slug']]);
        $email = $EmailModel->findBy(['id' => $annonce['id_email']]);
        for ($i = 0; $i < 5; $i++) {
            $annonce['photo' . $i] = $photos[$i]['photo'];
        }
        $annonce['email'] = $email[0]['email'];



        // echo 'fail';
        if ($_POST) {
            if ($_POST['email'] == $annonce['email']) {
                $envoieAnnonces = $AnnoncesModel
                    ->setnom($_POST['nom'])
                    ->setdescription($_POST['description'])
                    ->setprix($_POST['prix'])
                    ->setvalidite(1);
                $AnnoncesModel->update($_SESSION['param']['slug'], $envoieAnnonces);
                for ($i = 0; $i < 5; $i++) {
                    $file = $_FILES['photo' . $i];
                    $fileName = $_FILES['photo' . $i]['name'];
                    $fileTmpName = $_FILES['photo' . $i]['tmp_name'];
                    $fileSize = $_FILES['photo' . $i]['size'];
                    $fileError = $_FILES['photo' . $i]['error'];
                    $fileType = $_FILES['photo' . $i]['type'];

                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower((end($fileExt)));
                    $allowed = array('jpg', 'jpeg', 'png');
                    if (!empty($_FILES['photo' . $i]['name'])) {
                        if (in_array($fileActualExt, $allowed)) {
                            if ($fileError === 0) {
                                if ($fileSize < 1000000) {
                                    $fileDestination = 'img/' . $_POST['email'] . $_SESSION['param']['slug'] . '/' . $annonce['photo' . $i];
                                    move_uploaded_file($fileTmpName, $fileDestination);
                                } else {
                                    echo "l'image est trop volumineuse";
                                }
                            } else {
                                echo "il y as eu une erreur lors de l'envoie des images";
                            }
                        } else {
                            echo "seule les jpeg ,jpg et png sont autorisé";
                        }
                    }
                }
            }
        }
        // echo "<pre>", print_r($annonce), print_r($_POST), print_r($_FILES), "</pre>";
        // echo 'fail';
       
        $this->twig->display('update.html.twig', compact('annonce')); 
        clearstatcache();
    }
}
