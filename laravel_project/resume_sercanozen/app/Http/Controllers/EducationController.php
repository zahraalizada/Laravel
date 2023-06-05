<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationAddRequest;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function list()
    {
        return view('admin.education_list');
    }

    public function addShow(){
        return view('admin.education_add');
    }

    public function add(EducationAddRequest $request){
        dd($request->all());
    }
}
