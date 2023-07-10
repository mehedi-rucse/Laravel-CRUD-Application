<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(9);
        // dd($books);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author'=> 'required',
            'isbn' => 'required',
            'price' => ['required', 'numeric'],
            'available'=> ['required', 'numeric']
        ]);
        $books = Book::create([
            'title'     => $request->title,
            'author'    => $request->author,
            'isbn'      => $request->isbn,
            'price'     => $request->price,
            'available' => $request->available
        ]);

        return redirect()->route('books.index' )->with('success', 'Book Created Succesfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author'=> 'required',
            'isbn' => 'required',
            'price' => ['required', 'numeric'],
            'available'=> ['required', 'numeric']
        ]);
        $book->update([
            'title'     => $request->input('title'),
            'author'    => $request->input('author'),
            'isbn'      => $request->input('isbn'),
            'price'     => $request->input('price'),
            'available' => $request->input('available')
        ]);

        return redirect()->route('books.index' )->with('success', 'Book Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Book updated succesfully');
    }
    public function download(){
        $books = Book::orderBy('id','desc')->get();
        $pdf = PDF::loadView('books.download', compact('books'));
        return $pdf->download('booklist.pdf');
    }
    public function search(Request $request)
    {
  
        $search = $request->input('search');
        $books = Book::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('author', 'LIKE', "%{$search}%")
            ->paginate(9);

        return view('books.index', ['books' => $books]);
    }

}
