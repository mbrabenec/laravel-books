@extends('layouts.maintail')

@section('content')

<div class="w-6/12 mx-auto mt-10">

    <div class="text-6xl mb-3">Create a new Reservation</div>

    @if ($errors->any())
    <div>
        <h4>Validation errors!</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif  

<form action="{{ action('ReservationController@store') }}" method="post" class="border-solid border-2 border-blue-700 p-2 mb-6 rounded-lg flex flex-col">
    @csrf

    <label for="">Book</label>
    <select name="book_id">
        @foreach ($books as $book)
        <option value="{{ $book->id }}">{{ $book->title }}</option>
        @endforeach
    </select>

    <label for="">To</label>
    <input type="date" name="to" class="p-2 rounded-md" value="{{ old('from') }}"/>

    <label for="">From</label>
    <input type="date" name="from" class="p-2 rounded-md" value="{{ old('from') }}"/>

    <input type="submit" value="Create" class="my-3 p-2 rounded-md bg-green-300 hover:bg-green-700 transition-color duration-400 ease-out">
</form>

</div>

@endsection