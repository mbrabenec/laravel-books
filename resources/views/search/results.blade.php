@extends('layouts.maintail')


@section('content')

    <div class="search-results">

        <div class="text-6xl mb-3">Search </div>

        <div class="search-results__options">

            {{-- <form action="{{ action('SearchController@books') }}" method="get"> --}}
            <form action="" method="get">

                <input type="hidden" name="page" value="{{ $books->currentPage() }}">

                <select name="results_on_page">
                    <option value="10" {{ $items_on_page == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ $items_on_page == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ $items_on_page == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $items_on_page == 100 ? 'selected' : '' }}>100</option>
                </select>

                <button>Set number of results per page</button>

                <select name="orderby">
                    <option value="name_ascending" {{ $orderby == 'name_ascending' ? 'selected' : '' }}>Name ascending
                    </option>
                    <option value="name_descending" {{ $orderby == 'name_descending' ? 'selected' : '' }}>Name descending
                    </option>
                </select>

                <button>Set ordering</button>

                <input type="text" name="search" value="{{ $search_term }}">

                <button>Search</button>

                <input type="submit" name="display_as_list" value="Display as list">
                <input type="submit" name="display_as_grid" value="Display as grid">
            </form>

        </div>

       
        {{ $books->links() }}
   

        <div class="search-results__results {{ $display_as == 'grid' ? 'search-results__results--grid' : '' }}">

            @foreach ($books as $book)

                <div class="search-results__book result-book">

                    <div class="result-book__title">{{ $book->title }}</div>

                    <div class="result-book__image">
                        <img src="{{ $book->image }}" alt="{{ $book->title . ' cover' }}">
                    </div>

                </div>

            @endforeach

        </div>

        {{ $books->links() }}

    </div>

@endsection
