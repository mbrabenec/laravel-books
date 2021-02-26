<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;

class BookController extends Controller
{
    public function index()
    {
        $count = DB::table('books')->count();
        // $books     = DB::table('books')->offset(10)->limit(10)->orderBy('title','asc')->get();
        $books     = DB::table('books')->orderBy('id','asc')->paginate(20);

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

        $book = Book::find($id);

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

    public function review ($id, Request $request) {

        

        $this->validate($request, [
            'rating' => ['required', 'digits_between:0,100'],
            'text' => ['required', 'string','max:255']
        ],[
            'rating.required' => 'ENTER A RATING!!!!!!',
            'rating.digits_between' => 'BETWEEN 0-100 !!!!!!',
            'text.required' => "c'mon, type some text",
            'text.string' => "c'mon, text",
            'text.max' => "c'mon, type less"

        ]);
        
        $data = $request->all();
        $data['book_id'] = $id;
        $review = Review::create($data);

        return back();

    }

    public function delreview ($id) {

        $todel = Review::find($id);
        $todel->delete();



        return back();

    }

    

}
