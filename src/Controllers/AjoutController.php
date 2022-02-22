<?php
namespace App\Controllers;

class AjoutController extends Controller{
    public function index(){
        
        
        $this->twig->display('ajout.html.twig');
        
    }
}
if($_POST){
require_once "formulaire.php";
header('Location: ../Otroc');
}