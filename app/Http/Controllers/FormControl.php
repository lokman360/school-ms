<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\myform;

class FormControl extends Controller
{
    public function store(myform $data){
    	print_r($data->all());
    }
}
