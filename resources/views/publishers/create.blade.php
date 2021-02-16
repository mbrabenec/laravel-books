<h1>Create a new Publisher</h1>

<form action="{{ action('PublisherController@store')}}" method="post">
    @csrf
    <input type="text" name="title">
    <input type="submit" value="create new publisher">
</form>