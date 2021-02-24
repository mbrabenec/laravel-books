@extends('layouts.maintail')

@section('content')

    <div class="w-6/12 mx-auto mt-10">

        <a class="mb-1 text-sm text-blue-700 hover:underline" href="{{ action('CategoryController@index') }}">Back to Categories</a><br>
        <div class="text-6xl mb-4">Subcategories</div>

        <div class="text-2xl mb-4 underline">{{ $category->name }} : subcategories</div>

        <form action="{{ action('SubcategoryController@store', $category->id) }}" method="POST"
            class="border-solid border-2 border-blue-700 p-2 mb-6 rounded-lg">
            @csrf
            <label for="">Create a new Subcategory</label><br>
            <input type="text" name="name" class="p-2 rounded-md" />
            <input type="submit" value="Create" class="p-2 rounded-md">
        </form>

        <ul>
            @foreach ($category->subcategories as $subcat)

                <li class="list-disc list-inside mb-1">

                    {{ $subcat->name }}

                    <a href="{{ action('SubcategoryController@destroy', $subcat->id) }}">
                        <input type="submit" value="delete"
                            class="p-1 rounded-md bg-red-300 hover:bg-red-500 transition-color duration-400 ease-out" />
                    </a>

                    <a href="{{ action('SubcategoryController@edit', $subcat->id) }}">
                        <input type="submit" value="edit"
                            class="p-1 rounded-md bg-blue-300 hover:bg-blue-500 transition-color duration-400 ease-out" />
                    </a>
                </li>

            @endforeach
        </ul>
    </div>







@endsection
