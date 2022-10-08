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

    
    

    public function update(Request $request)
    {
         $userName = $request->input('name0');
         $userEmail = $request->input('email0');
         $userPhoneNumber = $request->input('phone_number0');
         $userZipCode = $request->input('zip_code0');
         $id = $request->input('id0');
        //  DD($id);
        //  BD::update('update users set name =?' ,[$userName]);
        // DB::table('users')->insert([
        //     'name' => $userName,
        //     'email'=>'user2@2.com',
        //     'password'=>'12345678'
             
        // ]);
         DB::table('users')
              ->where('id', $id)
              ->update( ['name' => $userName , 
                        'email' => $userEmail , 
                        'phone_number' => $userPhoneNumber , 
                        'zip_code' => $userZipCode]);
               return redirect('account-settings');//->away('http://127.0.0.1:8000/account-settings');
        
    }
}

