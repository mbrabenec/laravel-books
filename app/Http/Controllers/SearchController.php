<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function books(Request $request)
    {
        //                                                 default value
        $items_on_page = $request->input('results_on_page', 20);

        $orderby = $request->input('orderby', 'name_ascending');

        switch ($orderby) {
            default:
            case 'name_ascending':
                $order_column = 'title';
                $order_direction = 'asc';
                break;
            case 'name_descending':
                $order_column = 'title';
                $order_direction = 'desc';
                break;
            case 'id_ascending':
                $order_column = 'id';
                $order_direction = 'asc';
                break;
            case 'id_descending':
                $order_column = 'id';
                $order_direction = 'desc';
                break;
        }

        $search_term = $request->input('search');

        // start building the query, get the query builder object
        $query_builder = Book::orderBy($order_column, $order_direction);

        if ($search_term !== null) {
            $query_builder->where('title', 'like', '%' . $search_term . '%');
        }

        // actually run the query and get the results
        $books = $query_builder->paginate($items_on_page)->withQueryString();


        $display_as_list = $request->get('display_as_list');
        $display_as_grid = $request->get('display_as_grid');
        if ($display_as_grid) {
            $display_as = 'grid';
        } else {
            $display_as = 'list';
        }


        return view('search.results', compact('books', 'items_on_page', 'orderby', 'search_term', 'display_as'));
    }
}
