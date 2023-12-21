<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

  
class UserController extends Controller
{

    
    /**
     * Update the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // search  usersview 
        if($request->filled('search')){
            $users = User::search($request->search)->get();
        }else{
             $users = User::get();
            
        }
            return view('users',compact('users'));
            // return response()->json($users);
    }

}

