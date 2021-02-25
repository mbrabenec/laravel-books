@extends('layouts.maintail')

@section('content')

    <div class="w-5/12 mx-auto border-blue-400 border-4 rounded-lg p-3 mt-1">
        <div class="flex-col text-center">
            <div class="">
                <div class="text-3xl">{{ $book->title }}</div>
                <div class="text-sm">{{ $book->authors }}</div>
            </div class="">

            <img src="{{ $book->image }}" alt="{{ $book->title }} - cover" class="mx-auto">
        </div>

        @if ($errors->any())
            <div>
                <h4 class="text-red-600">Problem!</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="flex flex-col my-3" action="{{ action('OrderController@store', $book->id) }}" method="POST">
            @csrf

            <label for="">Order quantity</label>
            <input type="text" name='quantity' class="w-3/12 rounded-md mb-2">
            <input type="submit" value="Add to order" class="rounded-md mb-2 bg-blue-300 py-2">
            <input type="hidden" name="book_id" value="{{ $book->id }}">

        </form>


        @auth


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

                <form class="flex flex-col" action="{{ action('BookController@review', $book->id) }}" method="POST">
                    @csrf

                    <label for="">Enter your comments</label>
                    <input type="text" name='text' value="{{ old('text', '') }}" class="rounded-md mb-2">

                    <label for="">Add a rating (1-100)</label>
                    <input type="text" name='rating' value="{{ old('rating', '') }}" class="w-3/12 rounded-md mb-2">

                    <input type="submit" value="Submit review" class="rounded-md mb-2 bg-blue-300 py-2">

                </form>

            </div>

        @endauth

        <div class="text-xl my-3 underline">Reviews</div>


        @if (count($book->reviews))
            <div>
                <ul>
                    @foreach ($book->reviews as $review)
                        <li>
                            <span class="font-bold">{{ $review->rating }}/100</span> : {{ $review->text }} 
                            @can('admin')
                            <form method="post" action="{{ action('BookController@delreview', $review->id) }}">
                                @csrf
                                <input type="submit" value="delete">
                            </form>
                            @endcan
                        </li>
                    @endforeach
                </ul>
            </div>
        @else

            <p>No review yet. Please leave one</p>

        @endif



        <a href="{{ action('BookController@index') }}">
            <p class="mt-3 text-blue-800">Back to list of books</p>
        </a>
    </div>
@endsection
