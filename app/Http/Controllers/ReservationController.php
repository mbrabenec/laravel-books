<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::get();

        $user = Auth::user();
        // dd($user);

        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        


        $books = Book::all();
        return view('reservations.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required|exists:books,id',
            'from'    => 'required|date',
            'to'      => 'required|date',
        ]);

        $from = $request->input('from');
        $to   = $request->input('to');
        $book_id = $request->input('book_id');

        $reservations = Reservation::where('book_id', $book_id)->get();
        foreach($reservations as $res) {
            if($res->book_id == $book_id) {
                if((($res->to >= $from) && ($res->to <=$to)) || (($res->from >= $from) && ($res->from <=$to))) {
                    return Redirect::back()->withInput()->withErrors(['from' => 'Overlapping reservation']);
                }
            }
        }


        $data              = $request->all();
        $data[ 'user_id' ] = Auth::id();

        Reservation::create($data);

        return redirect(action('ReservationController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
