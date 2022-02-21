<?php
use App\Models\AnnoncesModel;
use App\Models\EmailModel;
use App\Models\PhotoModel;

$annoncesModel = new AnnoncesModel;
$emailModel = new EmailModel;
$photoModel = new PhotoModel;

// $annonces = $annoncesModel->findAll();
// $newAnnonces = utf8_encode($annonces);
$envoieAnnonces=$annoncesModel
->setnom($_POST['nom'])
->setdescription($_POST['description'])
->setprix($_POST['prix'])
;
$envoieEmail=$emailModel
->setemail($_POST['email'])
;
// $envoieEmail=$emailModel
// ->setemail($_POST['email'])
// ;

$newnom2=$annoncesModel->getnom();
echo "<pre>",print_r($envoieAnnonces),print_r($envoieEmail),"</pre>";

?>
