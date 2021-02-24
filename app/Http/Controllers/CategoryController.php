<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Idn;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Category::find($id);
        $category['name'] = $request->input('name');
        $category->save();
        return redirect(action('CategoryController@index'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required','max:250', 'unique:categories']
        ]);

        Category::create($request->all());
        return back();
    }

    public function destroy($id)
    {
        $todel = Category::find($id);

        if (count($todel->subcategories)) {
            foreach ($todel->subcategories as $sub) {
                $sub->delete();
            }
        }
        $todel->delete();

        return back();
    }
}
