@extends ('layouts.main')

@section('content')

    <h1>Create a bookshop</h1>

    <form action="{{ action('BookshopController@store') }}" method="post">
        @csrf

        <div class='form-field'>
            <label for="">Its name</label>
            <input type="text" name="name">
        </div>

        <div class='form-field'>
            <label for="">City</label>
            <input type="text" name="city">
        </div>

        <div class='form-field'><input type="submit" value="add bookshop"></div>
    </form>

@endsection