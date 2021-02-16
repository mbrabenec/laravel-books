<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

class EshopController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $books      = Book::get();

        return view('eshop.index', compact('categories', 'books'));
    }

    public function category($id)
    {
        $category = Category::find($id);

//        return view('eshop/category')->with(['category' => $category]);
//        return view('eshop/category', ['category' => $category]);
        return view('eshop/category', compact(['category']));
    }

    public function subcategory($id)
    {
        $subcategory = Subcategory::find($id);

        return view('eshop/subcategory', compact(['subcategory']));
    }
}
