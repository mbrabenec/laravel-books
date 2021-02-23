
@extends('layouts.main', [
    'title' => 'List of Publishers'
])

@section('content')
    

<h1>List of publishers</h1>

<ul>
    @foreach ($publishers as $p)
        <li>
            <a href="{{ action('PublisherController@show', $p->id) }}">
                {{ $p->title }}
            </a>

            <a href="{{ action('PublisherController@edit',$p->id) }}">edit</a>

            <h3>Books from {{ $p->title }}:</h3>
            <ul>
                @foreach ($p->books as $book)
                    <li>
                        {{ $book->title }}
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>

@endsection



