<!-- /resources/views/books/books.blade.php -->

{{-- This is a commet which won't get to browser --}}
{{-- <p>my variable is {{ $a }}</p> --}}

{{--<!-- Value of my variable is {{ $newVariable }} -->--}}

<h1>List of books</h1>

{{--<p>There are <?php echo $count; ?> books in our catalogue</p>--}}

<p>There are {{ $count }} books in our catalogue</p>

{{-- <?php echo $newVariable; ?> --}}
{{--{{ $newVariable }}--}}

{{--<?php echo $anotherVariable; ?>--}}
{{--{{ $anotherVariable }}--}}

<h2>User review:</h2>

{{--<p><?php echo htmlspecialchars($review); ?></p>--}}

<p>{{ $review }}</p>

<h2>Books</h2>


<ul>
    {{--    <?php--}}
    {{--        foreach($books as $b):--}}
    {{--    ?>--}}
    {{--        --}}{{-- $b lives here! --}}
    {{--        <li>{{ $b->title }}</li>--}}
    {{--    <?php--}}
    {{--        endforeach;--}}
    {{--    ?>--}}

    {{--    @foreach($books as $i => $b)--}}
    {{--        <li>#{{ $i }} - {{ $b->title }}</li>--}}
    {{--    @endforeach--}}

    @foreach($books as $b)
        <li>
            <a href="{{ action('BookController@show', $b->id) }}">
                {{ $b->title }}
            </a>
        </li>
    @endforeach

</ul>
