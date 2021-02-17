<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bookshop;

class BookshopController extends Controller
{
    public function index () {

        $bookshops = Bookshop::orderBy('name', 'asc')->get();
        return view('bookshop/index', compact(['bookshops']));

    }
    
    public function create () {
       
        return view('bookshop/create');

    }

    public function store (Request $request) {
        $bookshop = new Bookshop();
        $bookshop->name = $request->input('name');
        $bookshop->city = $request->input('city');
        $bookshop->save();
        return redirect(action('BookshopController@create'));

    }

}
