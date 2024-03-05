<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('users')->get();
        // dd($books);
        return view("book", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Book::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($book)
    {
        $book = Book::findOrFail($book);
    return view('editbook', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'author' => 'required|string|max:255',
    ]);

    $book = Book::findOrFail($id);
    $book->update($request->all());

    return redirect()->route('books.index')->with('success', 'Book updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect()->route('books.index')->with('success', 'Book deleted successfully');
}
}
