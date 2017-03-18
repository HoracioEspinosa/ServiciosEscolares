<?php

namespace Caribbean\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function horario()
    {
    	return view('horario');
    }
}
