<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Trip;
use App\Events\SubCategoryDeleted;
use App\Events\SubCategoryUpdated;
use App\Events\SubCategoryCreated;

class SubCategoryController extends Controller
{
    public function subCategory(Request $request)
    {
        $search = $request->input('search');
        $sub_category = [];
        if ($search) {
            $sub_category = SubCategory::where('company_id', 'like', "%$search%")
                                 ->orWhere('sub_name', $search)
                                 ->get();
        }                      
        return view('sub-category', ['sub_category' => $sub_category]);
    }
    
    public function subCategoryDestroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        event(new SubCategoryDeleted($subCategory));
        return redirect()->back()->with('success', 'Company deleted successfully.');
    }
    public function subCategoryUpdate(Request $request, $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update($request->all());
        event(new SubCategoryUpdated($subCategory));
        return redirect()->back()->with('success', 'Company updated successfully.');
    }
    public function subCategoryStore(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'sub_name' => 'required|string',
            'sub_rate' => 'required|numeric',
            'company_id' => 'required|numeric',
        ]);

        // Create a new company
        $subCategory = new SubCategory();
        $subCategory->sub_name = $request->sub_name;
        $subCategory->sub_rate = $request->sub_rate;
        $subCategory->company_id = $request->company_id;
        $subCategory->save();
        event(new SubCategoryCreated($subCategory));
        return redirect()->back()->with('success', 'Company added successfully');
    }
}
