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

        <div class='form-field'><button type="submit" class='bg-gray-300 rounded-md h-10 px-6 m-6'>Add bookshop</button></div>
    </form>

    

@endsection