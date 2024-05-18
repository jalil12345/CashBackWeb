<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Company;

class favoriteController extends Controller
{
    public function toggleFavorite(Request $request, $companyId)
    {
        $user = $request->user();

        $company = Company::findOrFail($companyId); // Retrieve the company from the database    

        if ($user->favorites()->where('company_id', $companyId)->exists()) {
            $user->favorites()->where('company_id', $companyId)->delete();
            $message = 'company removed from favorites.';
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'company_id' => $companyId,
            ]);
            $message = 'company added to favorites.';
        }

        return redirect()->back()->with('message', $message);
    }
    
        public function index(Request $request)
        {
            $user = $request->user(); // Get the authenticated user
            $favorites = Favorite::with('company')->where('user_id', $user->id)->get();
    
            if ($request->filled('search')) {
                // Check if the company_id exists in favorites
                $searchedCompany = $favorites->where('company_id', $request->search)->first();
        
                if ($searchedCompany) {
                    // If found, return the searched company
                    return response()->json([$searchedCompany]);
                } else {
                    // If not found, return an empty array
                    return response()->json([]);
                }
            }
    
            return response()->json($favorites);
        }
    
    
}
