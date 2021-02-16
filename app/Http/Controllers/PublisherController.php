<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = DB::table('publishers')->get();

        return view('publishers.index', compact('publishers'));
    }

    public function show($id)
    {
        $publisher = DB::table('publishers')->find($id);

        $books = DB::table('books')->where('publisher_id', $id)->get();

        return view('publishers.show', compact(['publisher', 'books']));
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $publisher = new Publisher;
        $publisher->title = $request->input('title');
        $publisher->save();

        
        return redirect(action('PublisherController@index'));
    }
}
