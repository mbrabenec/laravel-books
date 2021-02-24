@extends('layouts.maintail')

@section('content')

    <div class="w-6/12 mx-auto mt-10">

        <div class="text-6xl mb-3">Categories</div>

        <form action="{{ action('CategoryController@store') }}" method="post"
            class="border-solid border-2 border-blue-700 p-2 mb-6 rounded-lg flex flex-col">
            @csrf

            <label for="">Create a new Category</label>
            <input type="text" name="name" value="{{ old('name'), "" }}" class="p-2 rounded-md @error('name') border-2 border-red-700 @enderror"/>
            
            @error('name')
                <div class=" text-red-600 text-sm">
                    {{ $message }}
                </div>
            @enderror


            <input type="submit" value="Create"
                class="my-3 p-2 rounded-md bg-green-300 hover:bg-green-700 transition-color duration-500 ease-out">
        </form>

        <form action="{{ action('SubcategoryController@storeflex') }}" method="post"
            class="border-solid border-2 border-blue-700 p-2 mb-6 rounded-lg flex flex-col">
            @csrf

            <label for="">Create a new Subcategory</label>
            <input type="text" name="name" class="p-2 rounded-md" />

            {{-- @error('name')
                <div class=" text-red-600 text-sm">
                    {{ $message }}
                </div>
            @enderror --}}

            <label for="">In Category</label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <input type="submit" value="Create"
                class="my-3 p-2 rounded-md bg-green-300 hover:bg-green-700 transition-color duration-400 ease-out">
        </form>

        <div class="text-2xl mb-3 underline">List of Categories</div>

        <ul>
            @foreach ($categories as $category)

                <li>
                    <a href="{{ action('CategoryController@show', $category->id) }}"><span
                            class="text-blue-700 hover:underline">{{ $category->name }}</span></a>

                    <a href="{{ action('CategoryController@destroy', $category->id) }}">
                        <input type="submit" value="delete"
                            class="p-1 rounded-md bg-red-300 hover:bg-red-500 transition-color duration-400 ease-out" />
                    </a>

                    <a href="{{ action('CategoryController@edit', $category->id) }}">
                        <input type="submit" value="edit"
                            class="p-1 rounded-md bg-blue-300 hover:bg-blue-500 transition-color duration-400 ease-out" />
                    </a>

                    <ul class="mb-2">
                        @foreach ($category->subcategories as $subs)
                            <li class="list-disc list-inside">
                                {{ $subs->name }}
                            </li>
                        @endforeach
                    </ul>
                </li>

            @endforeach
        </ul>
    </div>

@endsection
