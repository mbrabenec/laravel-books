@extends('layouts.main', [
    'title' => 'List of Publishers'
])

@section('content')

<h1>Edit Publisher</h1>

<form action="{{ action('PublisherController@update', $publisher->id)}}" method="post">
    @csrf
    @method('PUT')
    Pub name
    <input type="text" name="title" value="{{ old('title', $publisher->title) }}">
    <input type="submit" value="save edited publisher">
</form>

@endsection