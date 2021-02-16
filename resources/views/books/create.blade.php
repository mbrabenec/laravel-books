<h1>Create a new Book</h1>

<form action="{{ action('BookController@store')}}" method="post">
    @csrf

    title<input type="text" name="title"> <br>
    authors<input type="text" name="authors"><br>
    image<input type="text" name="image"><br>
    publisher_id<input type="text" name="publisher_id"><br>

    <input type="submit" value="create new book">
</form>