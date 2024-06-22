<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trip;
use App\Models\Company;
use App\Models\Favorite;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Paypal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeleteTokenMail;
use Illuminate\Support\Facades\Log;
  
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
        $users = [];
        // search  usersview 
        if($request->filled('search')){
            $users = User::search($request->search)->get();
        }else{
            $users = [];
        }
            return view('users',['users' => $users]);
            // return response()->json($users);
    }
   
    public function cou(Request $request) 
    { 
        $trips = Trip::get();
        $companies = Company::get();
        return view('cou', ['trips' => $trips, 'companies' => $companies]);
    }

    /**
     * Send a delete token to the user via email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendDeleteToken(Request $request)
    {
        $user = auth()->user(); // Assuming the user is authenticated

        $deleteToken = Str::random(60);

        $user->update(['token_delete' => $deleteToken]);

        // Send email with the delete token
        Mail::to($user->email)->send(new DeleteTokenMail($deleteToken));

        return redirect()->back()->with('successEmailDeleteSend', 'A delete token has been sent to your email.');
    }

    /**
     * Confirm account deletion based on the provided token.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function confirmDeleteAccount($token)
    {
        $user = User::where('token_delete', $token)->first();
        Log::info("Received token: $token");
        if (!$user) {
            return redirect()->route('home')->with('error', 'Invalid delete token.');
        }

        // Delete records from associated tables
        Favorite::where('user_id', $user->id)->delete();
        Payment::where('user_id', $user->id)->delete();
        Trip::where('user_id', $user->id)->delete();
        PaymentMethod::where('user_id', $user->id)->delete();
        Paypal::where('user_id', $user->id)->delete();
        // Soft delete the user
        $user->delete();
        return redirect()->route('home')->with('success', 'Your account has been deleted successfully.');
    }

}

