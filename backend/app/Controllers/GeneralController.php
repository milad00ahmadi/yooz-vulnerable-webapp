<?php

namespace App\Controllers;

class GeneralController extends Controller
{
    public function home()
    {
        echo view('hi');
    }

}