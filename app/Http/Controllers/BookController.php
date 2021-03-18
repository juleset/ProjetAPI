<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request)
    {
        /*if ($request->expectsJson()) {
            $books = Book::all();*/
            return new BookCollection(Book::all());
        /*}else{
            return abort(404);
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($book)
    {
        //if ($request->expectsJson()){
            return new BookCollection(Book::findOrFail($book));
        /*}else{
            return abort(404);
        }*/

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        $categories = Book::findOrFail($book);
        $categories->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book)
    {
        $categories = Book::findOrFail($book);
        $categories->delete();
    }
}
