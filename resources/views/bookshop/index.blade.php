@extends ('layouts.main')

@section('content')

<h1>List of Bookshops</h1>

<ul>
    @foreach($bookshops as $b)
    <li>
        {{ $b->name }} in {{ $b->city }}
    </li>
    @endforeach
</ul>

@endsection