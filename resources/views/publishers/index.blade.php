<h1>List of publishers</h1>

<ul>
    @foreach($publishers as $p)
        <li>
            <a href="{{ action('PublisherController@show', $p->id) }}">
                {{ $p->title }}
            </a>
        </li>
    @endforeach
</ul>
