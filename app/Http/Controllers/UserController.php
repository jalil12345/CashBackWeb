<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trip;
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
            $users = User::search('user0')->get();
        }
            return view('users',['users' => $users]);
            // return response()->json($users);
    }
    public function cou(Request $request) 
    { 
        $trips = Trip::get();

        return view('cou', ['trips' => $trips]);
    }
}

