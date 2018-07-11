<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use Illuminate\Http\Request;
use App\Author;
use App\Http\Requests\StoreAuthorRequest;
use Maatwebsite\Excel\Facades\Excel;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::paginate(5);
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        Author::create($request->all());
        return redirect()->route('authors.index')->with(['message' => 'User added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAuthorRequest $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        return redirect()->route('authors.index')->with(['message' => 'User updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('authors.index')->with(['message' => 'User deleted successfully']);
    }

    public function getSearch(Request $request)
    {
        $a = Author::WHERE('first_name', 'LIKE', '%' . $request->key . '%')->orWhere('email', 'LIKE', '%' . $request->key . '%')->orWhere('phone', 'LIKE', '%' . $request->key . '%')->get();

        return view('authors.search', compact('a'));
    }
    /**
     * Export to csv
     */
    public function exportCSV()
    {
        return Excel::download(new InvoicesExport, 'authors.csv');
    }
}
