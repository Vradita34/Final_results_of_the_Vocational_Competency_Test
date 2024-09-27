<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Exception;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Authors::all();
        return view('Admin.Authors.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Authors.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|unique:authors',
        ]);
        try {
            Authors::create($validation);
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
        $author = Authors::findOrFail($id);
        return view('Admin.Authors.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validation = $request->validate([
            'name' => 'required|string|unique:authors',
        ]);
        try {
            $author = Authors::findOrFail($id);
            $author->name = $validation['name'];
            $author->save();

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
            $author = Authors::findOrFail($id);

            $author->delete();

            return redirect()->back()->with('success','Delete success');
        } catch (Exception $e) {
            return redirect()->back()->with('error','Delete error'.$e->getMessage());
        }
    }
}
