<?php
namespace App\Controllers;

class AjoutController extends Controller{
    public function index(){
        
        
        $this->twig->display('ajout/index.html.twig');
        
    }
}