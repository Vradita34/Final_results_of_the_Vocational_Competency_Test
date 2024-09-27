<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('Auth.login');
    }

    public function register() {
        return view('Auth.register');
    }

    public function register_action(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'avatar' => 'nullable',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'address' => 'required|string',
         ]);

         try {
            //  if($request->hasFile('file')){
            //      $avatar = $request->file('file')->store('files', 'public');
            //  }
             User::create([
                 'name' => $validation['name'],
                 'username' => $validation['username'],
                 'email' => $validation['email'],
                 'role' => 'reader',
                 'password' => $validation['password'],
                 'address' => $validation['address'],
             ]);

             return redirect()->back()->with('success',' Register success');
         } catch (Exception $e) {
             return redirect()->back()->with('error',' Register error'.$e->getMessage());
         }
    }

    public function login_action(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
         ]);

         try {
            if(Auth::attempt($validation)){
                $role = Auth::user()->role;
                switch ($role) {
                    case 'admin':
                    case 'librarian':
                        return redirect()->route('dashboardAdmin')->with('success','login successfully');

                    case 'reader':
                        return redirect()->route('dashboard')->with('success','login successfully');
                    default:
                    return redirect()->back()->with('error','role invalid');
                }
            }
            return redirect()->back()->with('error','email or password is not true');
        } catch (Exception $e) {
            return redirect()->back()->with('error','login  error'.$e->getMessage());
        }
    }

    public function logout(Request $request){
        try {

            $request->session()->invalidate();
            $request->session()->flush();
            $request->session()->regenerateToken();
            Auth::logout();

            return redirect()->back()->with('success','logout success');
        } catch (Exception $e) {
            return redirect()->back()->with('error','logout error'.$e->getMessage());
        }
    }
}
