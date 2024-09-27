<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use App\Models\Collections;
use App\Models\Perizinan;
use App\Models\Reviews;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReaderController extends Controller
{
    public function homepage()
    {
        $books = Books::all();
        $topViews = Books::withCount('perizinans')->orderByDesc('perizinans_count')->get();
        $categories = Category::all();
        return view('homepage', compact('books','topViews'));
    }

    public function book_detail($id)
    {
        $isExpired = false;
        $topViews = Books::withCount('perizinans')->orderByDesc('perizinans_count')->get();
        $book = Books::findOrFail($id);
        $reviews = Reviews::where('book_id',$book->id)->get();
        $averageRate = Reviews::where('book_id',$book->id)->avg('rate');
        // dd($averageRate);
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $permission = Perizinan::where('book_id',$id)->where('user_id',$user_id)->orderByDesc('created_at')->first();
            if($permission && $permission->expired_date && $permission->expired_date < now()){
                $isExpired = true;
            }
            // dd($permission);
        }else{
            $permission = null;
        }
        return view('book_detail', compact('averageRate','permission','isExpired','book','reviews'));
    }
    public function book_viewer($id)
    {
        $permission = Perizinan::findOrFail($id);
        if($permission == null){
            return redirect()->back()->with('error','send request to read this book');
        }
        return view('book_viewer', compact('permission'));
    }
    public function collection()
    {
            $collects = Collections::where('user_id',Auth::user()->id)->get();


        return view('collection',compact('collects'));
    }

    public function addCollection($id){
        try {
            if(Auth::check()){
                $user_id = Auth::user()->id;
            }else{
                return redirect()->back()->with('error', 'add collection error, login to add collection');
            }
            $existscollection = Collections::where('book_id',$id)->where('user_id',$user_id)->first();
            if($existscollection){
                return redirect()->back()->with('error', 'add collection error, Ready in Collection');
            }elseif($existscollection == null){
                Collections::create([
                    'book_id' => $id,
                    'user_id' => Auth::user()->id,
                ]);
                return redirect()->back()->with('success', 'add collection success');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'add collection error' . $e->getMessage());
        }
    }

    public function removeCollection($id)
    {
        try {
            $collection = Collections::findOrFail($id);
            $collection->delete();
            return redirect()->back()->with('success',' Your collection has deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Error'.$e->getMessage());
        }
    }
    public function addIzin($id){
        try {
            if(Auth::check()){
                $user_id = Auth::user()->id;
            }else{
                return redirect()->back()->with('error', 'Login to send Permission');
            }

            $existsPermissions = Perizinan::where('book_id',$id)->where('user_id',$user_id)->where(function($query){
                $query->whereIn('status',['process','approved']);
            })->orderByDesc('created_at')->first();
            // dd($existsPermissions);
            if($existsPermissions){
                return redirect()->back()->with('error', 'You have an Permission');
            }else{
                Perizinan::create([
                    'book_id' => $id,
                    'user_id' => Auth::user()->id,
                ]);
                return redirect()->back()->with('success', 'add izin success');
            }
            return redirect()->back()->with('error', 'add izin failed');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'add izin error' . $e->getMessage());
        }
    }

    public function cancelPermission($id)
    {
        try {
            $perizinan = Perizinan::findOrFail($id);

            $perizinan->delete();

            return redirect()->back()->with('success',' Cancel Permission success, your permission has deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Candel Permission error'.$e->getMessage());
        }
    }

    public function myPermissions(){

            $permissions = Perizinan::where('user_id',Auth::user()->id)->orderByDesc('created_at')->get();
            return view('my_permission',compact('permissions'));
    }

    public function addReview(Request $request,$id)
    {
        $data = $request->validate([
            'reviews' => 'required',
            'rate' => 'required',
        ]);
        try {
            if(Auth::check()){
                $user_id = Auth::user()->id;
                $permission = Perizinan::where('book_id',$id)->where('user_id',$user_id)->orderByDesc('created_at')->first();
                $existsReviews = Reviews::where('book_id',$id)->where('user_id',$user_id)->first();
                if($permission){
                    if($existsReviews){
                        return redirect()->back()->with('error', 'You have don`t maked review');
                    }
                    $data['user_id'] = $user_id;
                    $data['book_id'] = $id;
                    Reviews::create($data);
                    return redirect()->back()->with('success', 'add reviews success');
                }else{
                    return redirect()->back()->with('error', 'send request to add reviews');
                }
            }else{
                return redirect()->back()->with('error', 'login to add review');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'add Review error' . $e->getMessage());
        }
    }
    public function editReview(Request $request,$id)
    {
        $validation = $request->validate([
            'reviews' => 'required',
            'rate' => 'required',
        ]);
        try {
            $review = Reviews::findOrFail($id);
            $review->reviews = $validation['reviews'];
            $review->rate = $validation['rate'];
            $review->save();

            return redirect()->back()->with('success','Update success');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Update error'.$e->getMessage());
        }
    }
    public function deleteReview($id)
    {
        try {
            if(Auth::check()){
                $genre = Reviews::findOrFail($id);
                $genre->delete();
                return redirect()->back()->with('success','Delete success');
            }else{
                return redirect()->back()->with('error','Login to access');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error','Delete error'.$e->getMessage());
        }
    }


    public function updateProfile(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'address' => 'required|string',
            'oldPassword' => 'nullable|string',
            'newPassword' => 'nullable|string',
         ]);
         try {
            $user = User::findOrFail(Auth::user()->id);
            $user->name = $validation['name'];
            $user->username = $validation['username'];
            $user->address = $validation['address'];
            if($request->has('oldPassword') && $request->has('oldPassword')){
                if(Hash::check($request->input('oldPassword'), $user->password)){
                    $user->password = $validation['newPassword'];
                    $user->save();
                }
            }
            $user->save();
             return redirect()->back()->with('success','update user success');
         } catch (Exception $e) {
             return redirect()->back()->with('error','update user error'.$e->getMessage());
         }
    }
}
