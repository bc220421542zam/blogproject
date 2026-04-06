<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class AuthController extends Controller
{
   public function register(Request $request){
     
       //Validate
       $fields = $request->validate([
        'username' => ['required', 'max:255'],
         'email' => ['required', 'max:255', 'email', 'unique:users'],
         'password' => ['required', 'min:3', 'confirmed'],
       ]);

       $fields['password'] = bcrypt($fields['password']);
       
       //Register
       $user = User::create($fields);
 
       //Login
       Auth::login($user);
 
      //Redirect
      return redirect()->route('dashboard');
   }

   //login user function
   public function login(Request $request){
          $fields = $request->validate([
         'email' => ['required', 'max:255', 'email'],
         'password' => ['required']
       ]);   
        
       //Try to login the User
        if(Auth::attempt($fields, $request->remember )){
          return redirect()->route('dashboard');
        }else{
          return back()->withErrors([
            'failed' => 'The provided credentials do not match
            our records.'
          ]);
        }

    }

    //logout user
    public function logout(Request $request){
      //logout the user
      Auth::logout();
      // Invelidate user's session
      $request->session()->invalidate();
      //regenerate CSRF token
      $request->session()->regenerateToken();

      // Clear old intended URL to prevent 404 after another user login
      $request->session()->forget('url.intended');
      //Redirect to home
      return redirect('/');
    }
}