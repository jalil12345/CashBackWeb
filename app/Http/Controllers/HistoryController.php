<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function recordClick(Request $request) 
    {
        History::create([
            'p_cashback' => $request->input('p_cashback'),
            'p_store' => $request->input('p_store'),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Click recorded successfully']);
    }
}
