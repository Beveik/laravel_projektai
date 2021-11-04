<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book)
    {
        $books=Book::all();
        $authors=Author::orderBy( 'id', 'asc')->paginate(15);
        return view("author.index", ["authors"=>$authors, "book"=>$book, "books"=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("author.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author= new Author;
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;

        $author ->save(); //insert į duomenų bazę
        return redirect()->route("author.index")->with('success_message','Author is added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $books = $author->AuthorBooks;
        $books_count = $books->count();
        return view('author.show', ['author' => $author, "books"=> $books, "books_count" => $books_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view("author.edit", ["author"=> $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;

        $author ->save();
        return redirect()->route("author.index")->with('success_message','Author is updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        // return redirect()->route("type.index");
        return redirect()->route("author.index")->with('success_message','Author is deleted.');

    }
}
