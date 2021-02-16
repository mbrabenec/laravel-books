<h1>{{ $book->title }}</h1>
<h2>{{ $book->authors }}</h2>

<img src="{{ $book->image }}" alt="{{ $book->title }} - cover">

<a href="{{ action('BookController@index') }}">
    Back to list of books
</a>
