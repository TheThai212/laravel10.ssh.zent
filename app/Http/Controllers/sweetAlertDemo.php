<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;


class sweetAlertDemo extends Controller
{
	public function index(){
     Alert::warning('Warning Message', 'Optional Title');
		
     return view('demoSweetAlert.demo');
	}

    
}
