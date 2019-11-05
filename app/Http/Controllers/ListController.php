<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function show()
    {
        $characters = [
        ];

        return view('welcome')->withCharacters($characters);
    }
}
