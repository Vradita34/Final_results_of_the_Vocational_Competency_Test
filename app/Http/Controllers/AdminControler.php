<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use App\Models\Perizinan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminControler extends Controller
{
    public function dashboard() {
        $usersTotal = User::all()->count();
        $booksTotal = Books::all()->count();
        $permissionsTotal = Perizinan::all()->count();
        $authorsTotal = Authors::all()->count();
        // dd($authorsTotal);
        return view('Admin.dashboard',compact('usersTotal','booksTotal','permissionsTotal','authorsTotal',));
    }

    public function newPermissions()
    {
        $permissions = Perizinan::where('status','process')->get();
        return view('Admin.Permissions.index',compact('permissions'));
    }
    public function oldPermissions()
    {
        $permissions = Perizinan::whereNot('status','process')->get();
        return view('Admin.Permissions.index2',compact('permissions'));
    }

    public function handlePermissions(Request $request,$id){
        $validate = $request->validate([
            'note' => 'nullable|string',
            'action' => 'required|in:approved,decline',
        ]);
        try {
            $permission = Perizinan::findOrFail($id);
            $permission->note = $validate['note'];
            $permission->status = $validate['action'];
            $permission->librarian = Auth::user()->email;
            $expired_at = now()->addDays($permission->book->read_duration);
            if($validate['action'] == 'approved'){
                $permission->expired_date = $expired_at;
                $permission->save();
                return redirect()->back()->with('success','handle permission successfully');
            }elseif($validate['action'] == 'decline'){
                $permission->save();
                return redirect()->back()->with('success','handle permission successfully');
            }else{
                return redirect()->back()->with('error','Undefined action');
            }

        } catch (Exception $e) {
            return redirect()->back()->with('error','error'.$e->getMessage());
        }
    }

    public function printPermission(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $usersTotal = User::all()->count();
        $booksTotal = Books::all()->count();
        $permissionsTotal = Perizinan::all()->count();
        $authorsTotal = Authors::all()->count();
        try {
            $permissions = Perizinan::where(function ($query) use ($start_date,$end_date){
                $query->whereBetween('created_at',[$start_date,$end_date]);
            })->get();
            return view('Admin.dashboard',compact('permissions','usersTotal','booksTotal','permissionsTotal','authorsTotal',));
        } catch (Exception $e) {
            return redirect()->back()->with('error','error'.$e->getMessage());
        }
    }

    public function printBookPopular(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $usersTotal = User::all()->count();
        $booksTotal = Books::all()->count();
        $permissionsTotal = Perizinan::all()->count();
        $authorsTotal = Authors::all()->count();
        try {
            $books = Books::withCount('perizinans')->where(function ($query) use ($start_date,$end_date){
                $query->whereBetween('created_at',[$start_date,$end_date]);
            })->orderByDesc('perizinans_count')->get();
            return view('Admin.dashboard',compact('books','usersTotal','booksTotal','permissionsTotal','authorsTotal',));
        } catch (Exception $e) {
            return redirect()->back()->with('error','error'.$e->getMessage());
        }
    }
}
