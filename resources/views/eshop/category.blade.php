<h1>Category: {{ $category->name }}</h1>

<a href="{{ action('EshopController@index') }}">
    Back to list of categories
</a>

<h2>Subcategories</h2>

<ul>
    @foreach($category->subcategories as $s)
        <li>{{ $s->name }}</li>
    @endforeach
</ul>

@foreach($category->books as $b)
    <h2>{{ $b->title }}</h2>
@endforeach
