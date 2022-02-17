<?php
namespace App\Controllers;

class ErrorController extends Controller{
    public function index(){
        
        
        $this->twig->display('error.html.twig');
        
    }
}