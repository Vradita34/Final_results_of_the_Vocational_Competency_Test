<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use App\Models\Category;
use App\Models\Genres;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return view('Admin.Books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Authors::all();
        $genres = Genres::all();
        return view('Admin.Books.add',compact('categories','authors','genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'synopsis' => 'required|string',
            'release_date' => 'required|date',
            'read_duration' => 'required|integer',
            'author_id' => 'required',
            'category_id' => 'required',
            'genres' => 'required|array',
            'genres.*' => 'required|exists:genres,id',
            'cover' => 'nullable',
            'file' => 'required|file',
        ]);

        try {
            if($request->hasFile('cover')){
                // $data['cover'] = $request->file('cover')->store('avatars','public');
                // $path = $request->photo->storeAs('images', 'filename.jpg');
                $data['cover'] = $request->file('cover')->store('covers', 'public');
            }
            if($request->hasFile('file')){
                $data['file'] = $request->file('file')->store('files', 'public');
            }
            $data['publisher_id'] = Auth::user()->id;
            $book = Books::create($data);
            if($request->has('genres')){
                $book->genres()->attach($data['genres']);
                $book->save();
            }

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
        $categories = Category::all();
        $authors = Authors::all();
        $genres = Genres::all();
        $book = Books::findOrFail($id);
        $book_genre = $book->genres->pluck('genre_id')->toArray();
        return view('Admin.Books.edit',compact('categories','authors','genres','book','book_genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'synopsis' => 'required|string',
            'release_date' => 'required|date',
            'read_duration' => 'required|integer',
            'author_id' => 'required',
            'category_id' => 'required',
            'genres' => 'nullable|array',
            'genres.*' => 'nullable|exists:genres,id',
            'cover' => 'nullable',
            'file' => 'nullable|file',
        ]);

        try {
            if($request->hasFile('cover')){
                $data['cover'] = $request->file('cover')->store('covers', 'public');
            }
            if($request->hasFile('file')){
                $data['file'] = $request->file('file')->store('files', 'public');
            }
            $book = Books::findOrFail($id);
            if($request->has('genres')){
                $book->genres()->sync($data['genres']);
                $book->save();
            }
            $book->title = $data['title'];
            $book->synopsis = $data['synopsis'];
            $book->release_date = $data['release_date'];
            $book->read_duration = $data['read_duration'];
            $book->author_id = $data['author_id'];
            $book->category_id = $data['category_id'];
            $book->save();

            return redirect()->back()->with('success','update success');
        } catch (Exception $e) {
            return redirect()->back()->with('error','update error'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $book = Books::findOrFail($id);

            if($book->cover){
                Storage::disk('public')->delete($book->cover);
            }
            if($book->file){
                Storage::disk('public')->delete($book->file);
            }
            $book->genres()->detach();
            $book->delete();

            return redirect()->back()->with('success','delete success');
        } catch (Exception $e) {
            return redirect()->back()->with('error','delete error'.$e->getMessage());
        }
    }
}
