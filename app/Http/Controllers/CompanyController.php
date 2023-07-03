<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
            $companies = Company::get();
          
        return view('stores', compact('companies'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function favorite(Request $request)
    {
       
            $companies = Company::get();
          
        return view('favorites', compact('companies'));
    }
}



