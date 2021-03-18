<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AuthorCollection
     */
    public function index()
    {
        $authors = Author::with('books')->get();
        return new AuthorCollection($authors);
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
        Author::create(array_merge($request->all(), ['id' => $uuid]));
    }


    public function show($author)
    {
        return new AuthorResource(Author::findOrFail($author));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {
        $categories = Author::findOrFail($author);
        $categories->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($author)
    {
        $categories = Author::findOrFail($author);
        $categories->delete();
    }
}
