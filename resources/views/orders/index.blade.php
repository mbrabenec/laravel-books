@extends('layouts.maintail')

@section('content')

    <div class="w-5/12 mx-auto border-blue-400 border-4 rounded-lg p-3 mt-1">

        <div class="flex-col text-center">


            <div class="text-2xl">Shopping Cart</div>
            <div class="text-sm">User: {{ Auth::user()->name }}</div>


            {{--  WIP --}}

            {{-- @if ($items->count())

                @foreach ($items as $item)

                @dd($item->books)

                @endforeach --}}

                




            @else
                <p class="text-red-500">cart is empty</p>
            @endif


        </div>


    </div>


@endsection
