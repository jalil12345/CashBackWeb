<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Log;

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
          
            return view('stores');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchStores(Request $request)
    {
        $perPage = $request->input('perPage',30); 
        $page = $request->input('page', 1);
    
        if ($request->filled('search')) {
            $companies = Company::search($request->search)->get();
        }else {
            $companies = Company::paginate($perPage, ['*'], 'page', $page);
        }
    
        return response()->json($companies);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
       
        $companies = Company::get();
          
        return response()->json($companies);
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



