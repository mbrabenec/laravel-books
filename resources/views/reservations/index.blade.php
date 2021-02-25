@extends('layouts.maintail')

@section('content')




    <div class="w-10/12 mx-auto mt-10">


        <div class="text-6xl mb-3">Reservations</div>

        <a href="{{ action('ReservationController@create') }}">
            <input type="submit" value="Make New Reservation" class="p-1 rounded-md bg-red-300" />
        </a>

        <br>

        <table class="table table-striped">
            <tr>
                <th>Book</th>
                <th>User</th>
                <th>From</th>
                <th>To</th>
            </tr>
            @if (count($reservations))
                @foreach ($reservations as $reservation)
                    <tr>
                        <th>{{ $reservation->book->title }}</th>
                        <th>
                        @if ($reservation->user->name)
                        {{ $reservation->user->name }}
                        @endif
                        </th>
                        
                        <th>{{ $reservation->from }}</th>
                        <th>{{ $reservation->to }}</th>
                    </tr>
                @endforeach

            @else
                There are no reservations to display
            @endif
        </table>



    </div>




@endsection
