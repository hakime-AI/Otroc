<?php

namespace App\Controllers;

class DeleteController extends Controller
{
    public function index()
    {


        $this->twig->display('delete.html.twig');
    }
}
