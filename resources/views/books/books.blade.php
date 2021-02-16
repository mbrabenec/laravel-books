


<h1>List of books</h1>

{{--<p>There are <?php echo $count; ?> books in our catalogue</p>--}}

<p>There are {{ $count }} books in our catalogue</p>

<h2>User review:</h2>

<p>some placeholder text</p>

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
