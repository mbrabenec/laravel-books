<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        // $publishers = DB::table('publishers')->get();
        $publishers = Publisher::with('books')->orderBy('title')->get();


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

    public function edit($publisher_id)
    {
        $publisher = Publisher::findOrFail($publisher_id);

        return view('publishers.edit', compact(['publisher']));
    }

    public function update(Request $request, $publisher_id)
    {
        //validation
        // validation
        $this->validate($request, [
            'title' => 'required|unique:publishers'
        ], [
            'title.required' => 'Just goddamn pick one'
        ]);

        //retireve
        $publisher = Publisher::findOrFail($publisher_id);

        //fill with data
        $publisher->title = $request->input('title');

        //save: sql insert
        $publisher->save();

        //inform user of success
        session()->flash('success_message', 'The publisher was saved');

        //redirect
        return redirect(action('PublisherController@index'));

    }

    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'title' => 'required|unique:publishers'
        ], [
            'title.required' => 'Just goddamn pick one'
        ]);


        // validation passed...

        //new pub obj
        $publisher = new Publisher;

        //fill with data
        $publisher->title = $request->input('title');

        //save: sql insert
        $publisher->save();

        //inform user of success
        session()->flash('success_message', 'The publisher was saved');

        //redirect
        return redirect(action('PublisherController@index'));
    }
}
