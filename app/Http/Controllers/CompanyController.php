<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Trip;
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
        if ($request->filled('search')) {
        $companies = Company::search($request->search)->get();
        }else {
        $companies = Company::get();
        }
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

    public function searchAdmin(Request $request)
    {
        $trips = Trip::get(); 
        $search = $request->input('search');
        $companies = [];
        if ($search) {
            $companies = Company::where('name', 'like', "%$search%")
                                 ->orWhere('id', $search)
                                 ->get();
        }                      
        return view('cou', ['trips' => $trips, 'companies' => $companies]);
    }
    public function searchAdminDestroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->back()->with('success', 'Company deleted successfully.');
    }
    public function searchAdminUpdate(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());
        return redirect()->back()->with('success', 'Company updated successfully.');
    }
    public function searchAdminStore(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'sub_category' => 'required|string',
            'url' => 'required|url',
            'image' => 'required|string',
            'rate' => 'required|string',
            'fix_amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'category' => 'required|string',
            'terms_exclutions'=> 'required|string',
        ]);

        // Create a new company
        $company = new Company();
        $company->name = $request->name;
        $company->sub_category = $request->sub_category;
        $company->url = $request->url;
        $company->image = $request->image;
        $company->category = $request->category;
        $company->terms_exclutions = $request->terms_exclutions;
        $company->rate = $request->rate;
        $company->fix_amount = $request->fix_amount;
        $company->save();
        return redirect()->back()->with('success', 'Company added successfully');
    }
}



