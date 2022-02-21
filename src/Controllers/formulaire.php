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
}    
$email=$emailModel->findBy(['email'=>$_POST['email']]);
$envoieAnnonces=$annoncesModel->setid_email($email[0]['id']);
$annoncesModel->create($envoieAnnonces);

print_r($a);
for($i=1;$i<=5;$i++){
    $file=$_FILES['image'.$i];
    $fileName=$_FILES['image'.$i]['name'];
    $fileTmpName=$_FILES['image'.$i]['tmp_name'];
    $fileSize=$_FILES['image'.$i]['size'];
    $fileError=$_FILES['image'.$i]['error'];
    $fileType=$_FILES['image'.$i]['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower((end($fileExt)));
    $allowed = array('jpeg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'img/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
            }else{
                echo "l'image est trop volumineuse";
            }
        }else{
            echo "il y as eu une erreur lors de l'envoie des images";
        }
        
    }else{
        echo "seule les jpeg,jpeg et png sont autorisé";
    }
}
// $emailModel->create($envoieEmail);
// $envoieEmail=$emailModel
// ->setemail($_POST['email'])
// ;

$newnom2=$annoncesModel->getnom();
echo "<pre>",print_r($envoieAnnonces),print_r($envoieEmail),"</pre>";
print_r($file);
?>
