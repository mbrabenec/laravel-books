@extends('layouts.maintail')

@section('content')

    <div class="w-6/12 mx-auto mt-10">

        <a class="mb-1 text-sm text-blue-700 hover:underline" href="{{ action('CategoryController@index') }}">Back to Categories</a><br>
        <div class="text-6xl mb-3">Edit Category</div>

        <form action="{{ action('CategoryController@update', $category->id) }}" method="post"
            class="border-solid border-2 border-blue-700 p-2 mb-6 rounded-lg flex flex-col">
            @csrf
            <label for="">Update Category Name</label>
            <input type="text" name="name" class="p-2 rounded-md" value="{{$category->name}}" />
            
            <input type="submit" value="Save" class="my-3 p-2 rounded-md bg-green-300 hover:bg-green-700 transition-color duration-500 ease-out">
        </form>

    </div>




@endsection
