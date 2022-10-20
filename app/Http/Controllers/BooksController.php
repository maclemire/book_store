<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::orderby('created_at', 'DESC')->paginate(10);
        return view("pages.home", compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Function to to show the create page
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Function to store the created book
        $request->validate([
            'title' => 'required|min:3|string|max:20',
            'description' => 'required|min:15|string|max:1000',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2000',
            'author' => 'required|min:3|string|max:20',
            'price' => 'required|min:1|max:4',
            'nombre_pages' => 'required|min:3|max:2000',
        ]);

        $validateImg = $request->file('image')->store('books');

        $new_book = Books::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $validateImg,
            'author' => $request->author,
            'price' => $request->price,
            'nombre_pages' => $request->nombre_pages,
        ]);

        if ($request->has('images')) {
            $imagesSelected = $request->file('images');
            foreach ($imagesSelected as $image) {
                $image_name = md5(rand(1000, 10000)) . '.' . strtolower($image->extension());
                $path_upload = 'images/';
                $image->move(public_path($path_upload), $image_name);}}

        return redirect()
            ->route('home')
            ->with('status', 'Le livre a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Books $book)
    {
        // Function to show the informations of a book
        return view("pages.show", compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $book)
    {
        // Function to to show the edit page
        return view("pages.edit", compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $book)
    {
        // Function to update a book
        if ($request->hasFile('image')) {
            Storage::delete($book->image);
            $book->image = $request->file('image')->store('books');
        }

        if ($request->has('images')) {
            $imagesSelected = $request->file('images');
            foreach ($imagesSelected as $image) {
                $image_name = md5(rand(1000, 10000)) . '.' . strtolower($image->extension());
                $path_upload = 'images/';
                $image->move(public_path($path_upload), $image_name);
            }
        }

        $request->validate([
            'title' => 'required|min:3|string|max:20',
            'description' => 'required|min:15|string|max:1000',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2000',
            'author' => 'required|min:3|string|max:20',
            'price' => 'required|min:1|max:4',
            'nombre_pages' => 'required|min:3|max:2000',
        ]);

        $validateImg = $request->file('image')->store('books');

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $validateImg,
            'author' => $request->author,
            'price' => $request->price,
            'nombre_pages' => $request->nombre_pages,
        ]);


        return redirect()
            ->route('books.show', $book->id)
            ->with('status', 'Le livre a bien été édité');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {                
        // Function to delete a book
        $book->delete();
        return redirect()
        ->route('home')
        ->with('status', "Le livre a bien été supprimé");
    }
}
