<?php
namespace App\Controllers;

class UpdateController extends Controller{

    public function index(){
        
        
        $this->twig->display('update.html.twig');
        
    }
}