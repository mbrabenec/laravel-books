<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $count = DB::table('books')->count();
        $books     = DB::table('books')->get();

//        return view('books.books')
//            ->with('count', $count)
//            ->with('books', $books)
//            ->with('newVariable', $a)
//            ->with('review', $review)
//            ->with('anotherVariable', $b);

//        return view('books.books')
//            ->with([
//                'count'           => $count,
//                'books'           => $books,
//                'newVariable'     => $a,
//                'review'          => $review,
//                'anotherVariable' => $b
//            ]);

//        return view('books.books', [
//            'count'           => $count,
//            'books'           => $books,
//            'newVariable'     => $a,
//            'review'          => $review,
//            'anotherVariable' => $b
//        ]);

//        return [
//            'count'  => $count,
//            'books'  => $books,
//            'review' => $review,
//        ];

//        return compact(['count', 'books', 'review']);

        // this approach does not allow to rename the variables

        return view('books.books', compact([
            'count',
            'books'
        ]));
    }

    public function show($id){

        $book = DB::table('books')->find($id);

        return view('books.show', compact(['book']));

    }

    public function create() {

        return view('books.create');

    }

    public function store(Request $request) {

        $book = new Book;
        $book->title = $request['title'];   //?????
        $book->authors = $request->input('authors');
        $book->image = $request->input("image", " ");
        $book->publisher_id = $request->input('publisher_id', '');
        
        $book->save();

        return redirect(action('BookController@index'));

    }

}
