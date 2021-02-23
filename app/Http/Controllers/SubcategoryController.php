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

        $newSub = Subcategory::create($data);

        return back();
    }


    public function destroy ($id)
    {
        $togo = Subcategory::find($id);
        $togo->delete();

        return back();
    }
}
