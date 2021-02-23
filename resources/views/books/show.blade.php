@extends('layouts.maintail')

@section('content')
<h1>{{ $book->title }}</h1>
<h2>{{ $book->authors }}</h2>

<img src="{{ $book->image }}" alt="{{ $book->title }} - cover">

<div>
    <span class="text-xl">Review Me</span>

    @if ($errors->any())
        <div class="text-red-600 my-6 text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="flex flex-col w-5/12" action="{{ action('BookController@review', $book->id) }}" method="POST">
        @csrf

        <label for="">Enter your comments</label>
        <input type="text" name='text' value="{{old('text', "")}}">

        <label for="">Add a rating (1-100)</label>
        <input type="text" name='rating' value="{{old('rating', "")}}">

        <input type="submit" value="Submit review">

    </form>

</div>


@if (count($book->reviews))
        <div>
            <ul>
                @foreach ($book->reviews as $review)
                    <li><span class="font-bold" >{{ $review->rating }}/100</span> : {{ $review->text }} </li>
                @endforeach
            </ul>
        </div>
@else

<p>No review yet. Please leave one</p>
    
@endif



<a  href="{{ action('BookController@index') }}">
    <p class="mt-3 text-blue-800">Back to list of books</p>
</a>
@endsection


