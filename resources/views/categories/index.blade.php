@extends('layouts.maintail')

@section('content')

    <div class="w-5/12 mx-auto mt-10">

        <div class="text-6xl mb-3">Categories</div>
    
            <form action="{{ action('CategoryController@store') }}" 
            method="post" class="border-solid border-2 border-blue-700 p-2 mb-6 rounded-lg">
                @csrf
                <label for="">Create a new Category</label>
                <input type="text" name="name" class="p-2 rounded-md"/>
                <input type="submit" value="Create" class="p-2 rounded-md">
            </form>


        <div class="text-2xl mb-3 underline">List of Categories</div>
    
        <ul>
            @foreach ($categories as $category)
    
                <li>
                    <a href="{{ action('CategoryController@show', $category->id) }}"><span class="text-blue-700">{{ $category->name }}</span></a>


                    <a href="{{ action('CategoryController@destroy', $category->id) }}">
                        <input type="submit" value="delete" class="p-1 rounded-md bg-blue-300 hover:bg-blue-700 transition-color duration-500 ease-out" />
                    </a>

                    <ul class="mb-2">
                        @foreach ($category->subcategories as $subs)
                            <li class="list-disc list-inside">
                                {{$subs->name}}
                            </li>
                        @endforeach
                    </ul>
    
                    {{-- <form action="{{ action('CategoryContoller@update', $category->id) }}">
                        @csrf
                        <input type="submit" value="Update" />
                    </form>
    
                    <form action="{{ action('CategoryContoller@delete', $category->id) }}">
                        @csrf
                        <input type="submit" value="delete" />
                    </form> --}}
    
                </li>
    
    
            @endforeach
        </ul>
    </div>




@endsection
