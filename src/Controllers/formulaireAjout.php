<?php
use App\Models\AnnoncesModel;
use App\Models\EmailModel;
use App\Models\PhotoModel;

$AnnoncesModel = new AnnoncesModel;
$emailModel = new EmailModel;
$photoModel = new PhotoModel;


$envoieAnnonces=$AnnoncesModel
->setnom($_POST['nom'])
->setdescription($_POST['description'])
->setprix($_POST['prix']);

$envoieEmail=$emailModel
->setemail($_POST['email']);

$email=$emailModel->findBy(['email'=>$_POST['email']]);
if(empty($email)){
    $emailModel->create($envoieEmail);
    $email=$emailModel->findBy(['email'=>$_POST['email']]);
    print_r($email);
}    
$envoieAnnonces=$AnnoncesModel->setid_email($email[0]['id']);
// print_r($email);
$AnnoncesModel->create($envoieAnnonces);
$maxAnnonce = $AnnoncesModel->findMax('id');
print_r($maxAnnonce);

var_dump($_FILES);
for($i=1;$i<=5;$i++){
   $file=$_FILES['photo'.$i];
    $fileName=$_FILES['photo'.$i]['name'];
    $fileTmpName=$_FILES['photo'.$i]['tmp_name'];
    $fileSize=$_FILES['photo'.$i]['size'];
    $fileError=$_FILES['photo'.$i]['error'];
    $fileType=$_FILES['photo'.$i]['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower((end($fileExt)));
    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew[$i] = uniqid('',true).".".$fileActualExt;
                @mkdir('img/'.$_POST['email'].$maxAnnonce['MAX(id)'].'/', 0755, true);
                $fileDestination = 'img/'.$_POST['email'].$maxAnnonce['MAX(id)'].'/'.$fileNameNew[$i];
                move_uploaded_file($fileTmpName,$fileDestination);
            }else{
                echo "l'image est trop volumineuse";
            }
        }else{
            echo "il y as eu une erreur lors de l'envoie des images";
        }
    }else{
        echo "seule les jpeg,jpg et png sont autorisé";
    }
}
for($i=0;$i<5;$i++){
    $envoiephoto=$photoModel
    ->setId_annonce($maxAnnonce['MAX(id)'])
    ->setphoto($fileNameNew[$i]);
    $photoModel->create($envoiephoto);
}
    $initAnnonce = $AnnoncesModel->findBy(['id' => $maxAnnonce['MAX(id)']]);
    $annonce = $initAnnonce[0];
    $photos = $PhotoModel->findBy(['id_annonce' => $maxAnnonce['MAX(id)']]);
    $email = $EmailModel->findBy(['id' => $annonce['id_email']]);
    for ($i = 1; $i <= 5; $i++) {
        $compteur=$i-1;
        $annonce['photo' . $compteur] = $photos[$compteur]['photo'];
    }
    // print_r($annonce);
        /*$annonce['email'] = $email[0]['email'];
            ob_start();
            $this->twig->display('mail.twig', compact('annonce'));
            $annonceHTML = ob_get_clean();
            
            // on transforme le template final en template html
            //$annonceHTML= $renderer->render($annonceMJML);

            $sujet = "mail de Validation/Update";
            $destinataire = $_POST['email'];
            $headers = 'Content-type: text/html; charset=utf-8';
            mail($destinataire, $sujet, $annonceHTML, $headers);
            die;
*/

// $newnom2=$AnnoncesModel->getnom();
// echo "<pre>",print_r($envoieAnnonces),print_r($envoieEmail),"</pre>";
// echo print_r($annonce);