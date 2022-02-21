<?php
use App\Models\AnnoncesModel;
use App\Models\EmailModel;
use App\Models\PhotoModel;

$annoncesModel = new AnnoncesModel;
$emailModel = new EmailModel;
$photoModel = new PhotoModel;


$envoieAnnonces=$annoncesModel
->setnom($_POST['nom'])
->setdescription($_POST['description'])
->setprix($_POST['prix']);

$envoieEmail=$emailModel
->setemail($_POST['email']);

$email=$emailModel->findBy(['email'=>$_POST['email']]);
if(empty($email)){
    $emailModel->create($envoieEmail);
    $email=$emailModel->findBy(['email'=>$_POST['email']]);
    $envoieAnnonces=$annoncesModel->setid_email($email[0]['id']);
    $annoncesModel->create($envoieAnnonces);
}else{
    $email=$emailModel->findBy(['email'=>$_POST['email']]);
    $envoieAnnonces=$annoncesModel->setid_email($email[0]['id']);
    $annoncesModel->create($envoieAnnonces);
}


// $emailModel->create($envoieEmail);
// $envoieEmail=$emailModel
// ->setemail($_POST['email'])
// ;

$newnom2=$annoncesModel->getnom();
echo "<pre>",print_r($envoieAnnonces),print_r($envoieEmail),print_r($email),"</pre>";

?>
