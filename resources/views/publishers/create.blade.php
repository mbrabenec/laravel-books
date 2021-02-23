@extends('layouts.main', [
    'title' => 'List of Publishers'
])

@section('content')

<h1>Create a new Publisher</h1>

<form action="{{ action('PublisherController@store')}}" method="post">
    @csrf
    Pub name
    <input type="text" name="title" value="{{old('title', $publisher->title)}}">
    <input type="submit" value="create new publisher">
</form>

@endsection