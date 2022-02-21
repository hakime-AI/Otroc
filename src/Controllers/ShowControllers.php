<?php
namespace App\Controllers;

class ShowController extends Controller{
    public function index(){
        
        
        $this->twig->display('show.html.twig');
        
    }
}