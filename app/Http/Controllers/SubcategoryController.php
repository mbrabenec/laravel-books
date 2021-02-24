<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function store ($id, Request $request)
    {
        $data = $request->input();
        $data['category_id'] = $id;
        Subcategory::create($data);
        return back();
    }

    public function storeflex (Request $request)
    {
        // $this->validate($request, [
        //     'name' => ['required','max:250'],
        //     'category_id' => ['required']
        // ]);

        Subcategory::create($request->all());
        return back();
    }

    public function destroy ($id)
    {
        $togo = Subcategory::find($id);
        $togo->delete();
        return back();
    }

    public function edit ($id)
    {
        $subcategory = Subcategory::find($id);
        
        $categories = Category::get();
        $category = $subcategory->category->id;
        return view('subcategories.edit', compact('subcategory', 'category', 'categories'));
    }

    public function update ($id, Request $request)
    {
        $subcategory = Subcategory::find($id);
        $subcategory['name'] = $request->input('name');
        $subcategory['category_id'] = $request->input('category_id');
        $subcategory->save();
        return redirect(action('CategoryController@index'));
    }
}
