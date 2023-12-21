<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class AffiliateController extends Controller
{
    public function index(){
        // return  Http::withToken('5v28cxa6fjn876zg6ft53jp6j2')->get('https://commissions.api.cj.com/query'
        //     ) 
        //     ->body();
        //     return view('affiliate',['data'=>$response]);
        $a =Http::get('https://fakestoreapi.com/products')->json();
         $b =collect($a)->toArray();
        DB::table('products')->oldest()->delete();
        
        for ($m = 0; $m <=4; $m++) {
        $c=$b[''.$m.'']['id'];
        $d=$b[''.$m.'']['title'];
        $e=$b[''.$m.'']['price'];
        $f=$b[''.$m.'']['description'];
        $g=$b[''.$m.'']['category'];
        $h=$b[''.$m.'']['image'];
        
        DB::table('products')
            ->updateOrInsert(
            ['id' => $c, ],
            ['title' => $d,'price' => $e, 'description' => 'desc', 'category' => $g, 'image' => $h]
           )
           ;
             }
           return  $c;
    }
}