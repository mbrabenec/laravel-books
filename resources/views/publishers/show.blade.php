<h1>{{ $publisher->title }}</h1>
<h2>Books</h2>

<ul>
    @foreach($books as $b)
        <li>
            <a href="{{ action('BookController@show', $b->id) }}">
                {{ $b->title }}
            </a>
        </li>
    @endforeach
</ul>


<a href="{{ action('PublisherController@index') }}">
    Back to list of publishers
</a>
