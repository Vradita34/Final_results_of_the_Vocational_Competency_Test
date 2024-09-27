<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Exception;
use Illuminate\Http\Request;

class GenresController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genres::all();
        return view('Admin.Genres.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Genres.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|unique:genres',
        ]);
        try {
            Genres::create($validation);
            return redirect()->back()->with('success','add success');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Add error'.$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $genre = Genres::findOrFail($id);
        return view('Admin.Genres.edit',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validation = $request->validate([
            'name' => 'required|string|unique:genres',
        ]);
        try {
            $genre = Genres::findOrFail($id);
            $genre->name = $validation['name'];
            $genre->save();

            return redirect()->back()->with('success','Update success');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Update error'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $genre = Genres::findOrFail($id);

            $genre->delete();

            return redirect()->back()->with('success','Delete success');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Delete error'.$e->getMessage());
        }
    }
}
