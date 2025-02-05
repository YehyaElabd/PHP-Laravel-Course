<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{
    //
    public function firstaction() 
    {
        $localName = 'Yehia';
        $books = ['PHP' , 'Javascript' , 'CSS'];
        return view('test', ['name' => $localName , 'books' => $books]);

    }

    public function greet() 
    {
        return 'Hello world';
    }
}
