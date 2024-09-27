<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNot('id',Auth::user()->id)->get();
        return view('Admin.Users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
           'name' => 'required|string',
           'username' => 'required|string',
           'avatar' => 'nullable',
           'email' => 'required|email',
           'role' => 'required',
           'password' => 'required|min:8',
           'address' => 'required|string',
        ]);

        try {
            if($request->hasFile('file')){
                $avatar = $request->file('file')->store('files', 'public');
            }
            User::create([
                'name' => $validation['name'],
                'username' => $validation['username'],
                // 'avatar' => $avatar,
                'email' => $validation['email'],
                'role' => $validation['role'],
                'password' => $validation['password'],
                'address' => $validation['address'],
            ]);

            return redirect()->back()->with('success','add new user success');
        } catch (Exception $e) {
            return redirect()->back()->with('error','add new user error'.$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Admin.Users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'avatar' => 'nullable|max:3124',
            'role' => 'required',
            'address' => 'required|string',
         ]);

         try {
            $user = User::findOrFail($id);
            if($request->hasFile('avatar')){
                if($user->avatar){
                    Storage::disk('public')->delete($user->avatar);
                }
                $validation['avatar'] = $request->file('avatar')->store('avatars','public');
            }
            $user->name = $validation['name'];
            $user->username = $validation['username'];
            $user->address = $validation['address'];
            $user->role = $validation['role'];
            $user->save();
             return redirect()->back()->with('success','update user success');
         } catch (Exception $e) {
             return redirect()->back()->with('error','update user error'.$e->getMessage());
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            if($user->avatar){
                Storage::disk('public')->delete($user->avatar);
            }
            $user->delete();
            return redirect()->back()->with('success','delete user success');
        } catch (Exception $e) {
            return redirect()->back()->with('error','delete user error'.$e->getMessage());
        }
    }
}
