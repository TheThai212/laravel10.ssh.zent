<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
class UserControllerl extends Controller
{
    public function index(){

    	return view('user.list');
    }
    public function datatablesListUser(){
    	return Datatables::of(User::query())->make(true);
    }
}
