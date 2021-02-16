<h1>Category: {{ $category->name }}</h1>

<a href="{{ action('EshopController@index') }}">
    Back to list of categories
</a>

<h2>Subcategories</h2>

<ul>
    @foreach($category->subcategories as $s)
        <a href="{{ action('EshopController@subcategory', $s->id) }}"><li>{{ $s->name }}</li></a>
    @endforeach
</ul>

@foreach($category->books as $b)
    <h2>{{ $b->title }}</h2>
    <img src="{{ $b->image }}" alt="{{ $b->image }} - cover">
    <p>{{ $b->authors }}</p>
    <a href="{{ action('BookController@show', $b->id) }}"><p>More details</p></a>
@endforeach
