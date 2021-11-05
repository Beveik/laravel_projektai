<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;
use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Author $author)
    {
        $books=Book::all();
        $authors=Author::all();
        $books = Book::query()->sortable()->orderBy( 'id', 'asc')->paginate(15);
         return view('book.index', ['books' => $books, 'authors'=>$authors, 'author'=>$author]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors=Author::all()->sortBy('name', SORT_REGULAR, true);


        return view("book.create", ["authors"=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authors=Author::all()->sortBy('name', SORT_REGULAR, true);
        $book= new Book;

        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->author_id = $request->book_authorid;

        $book ->save();
            // return redirect()->route("task.index");
            return redirect()->route("book.index", ["authors"=>$authors])->with('success_message','Book is created.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors=Author::all()->sortBy('name', SORT_REGULAR, true);

        return view("book.edit", ["book"=>$book, "authors"=>$authors]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $authors=Author::all();
        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->author_id = $request->book_authorid;

        $book ->save();
        return redirect()->route("book.index", ["authors"=>$authors])->with('success_message','Book is updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route("book.index")->with('success_message','Book is deleted successfully.');

    }
    public function search(Request $request, Book $book) {
        $authors=Author::all();
        $books=Book::all();
        $search = $request->search;
        // $name=$book->BookAuthor->name;

  if (isset($search) && !empty($search)){
// foreach ($books as $book)   {
// $surname=$book->BookAuthor->surname;
      $books = Book::query()->sortable()->join('authors','books.author_id','authors.id')
      ->where('title', 'LIKE', "%{$search}%")
      ->orWhere('surname', 'LIKE', "%{$search}%")
      ->orWhere('name', 'LIKE', "%{$search}%")
      ->paginate(15);
// }
  } else  {
      return redirect()->route("book.index")->with('danger_message','Your search is empty!');
  }
  return view("book.search",['books'=> $books, 'authors'=> $authors, 'book'=> $book]);
        //   return view("book.search",['books'=> $books, 'authors'=> $authors, 'book'=> $book, 'name'=> $name, 'surname'=> $surname]);
      }

      public function generatePDF(Author $author) {

        //1. Pasiimti visus duomenis x
        // 2. kazkokiu panaudoti pdf biblioteka
        // 3. sugeneruoti atsisiuntimo nuoroda

        $books = Book::all();
        // $books_count = $author->AuthorBooks;
        view()->share('books', $books,  'author', $author);

        $pdf = PDF::loadView('pdf_template_books', $books);

        return $pdf->download('books.pdf');
    }
    public function generateBook(Book $book)
    {
        view()->share('book', $book);

        $pdf = PDF::loadView("pdf_template_book", $book);
        return $pdf->download("book".$book->id.".pdf");

    }
}
