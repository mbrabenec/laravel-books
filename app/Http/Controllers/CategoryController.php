<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Idn;

class CategoryController extends Controller
{

    public function index ()
    {
        $categories = Category::get();

        return view('categories.index', compact('categories'));
    }


    public function show ($id)
    {
        $category = Category::find($id);

        

        return view('categories.show', compact('category'));
    }


    public function store (Request $request)
    {
        Category::create($request->all());

        return back();
    }


    public function destroy ($id)
    {
        $togo = Category::find($id);
        $togo->delete();

        return back();
    }

}
