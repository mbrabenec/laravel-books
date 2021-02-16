<h1>Books eshop</h1>

<h2>Categories</h2>

<ul>
    @foreach($categories as $c)
        <li>
            <a href="{{ action('EshopController@category', $c->id) }}">
            {{ $c->name }}
            </a>
        </li>
    @endforeach
</ul>


@foreach($books as $b)
    <div>
        <h2>{{ $b->title }}</h2>
        <h3>{{ $b->authors }}</h3>

        <img src="{{ $b->image }}" alt="{{ $b->title }} - cover">

        <p>
            <a href="{{ action('BookController@show', $b->id) }}">
                Detail of book
            </a>
        </p>
    </div>
@endforeach
