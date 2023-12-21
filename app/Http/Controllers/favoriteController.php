<?php

namespace App\Http\Controllers;

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
                'affiliate_networks_id' => $company->affiliate_networks_id,
                'companies_click_id' => $company->companies_click_id,
                'name' => $company->name,
                'url' => $company->url,
                'category' => $company->category,
                'image' => $company->image,
                'rate' => $company->rate,
                'duration' => $company->duration,
            ]);
            $message = 'company added to favorites.';
        }

        return response()->json(['message' => $message]);
    }
    public function index(Request $request)
    {
        $user = $request->user(); // Get the authenticated user
        $favorites = $user->favorites;

        if ($request->filled('search')) {
            $favorites = $favorites->search($request->search)->get();
        }

        return response()->json($favorites);
    }
}
