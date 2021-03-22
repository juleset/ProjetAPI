<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $uuid = Str::uuid();
        //$request->request->add(['id' => $uuid]);
        Book::create(array_merge($request->all(), ['id' => $uuid]));
    }


    public function show($book)
    {
        //if ($request->expectsJson()){
            return new BookResource(Book::findOrFail($book));
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
