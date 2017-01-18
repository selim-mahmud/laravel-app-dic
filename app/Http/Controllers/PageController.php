<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
	/**
	/* function to display home page
	/*
	/* @return pages.home views
	*/
    public function home(){
    	return view('pages.home');
    }

}