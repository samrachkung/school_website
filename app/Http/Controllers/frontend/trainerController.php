<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class trainerController extends Controller
{
    public function index(){
        return view('frontend.trainer.index');
    }
}
