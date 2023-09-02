@extends('layouts.app')
@section('content')
    <div>
        <h1>Iphone</h1>

        @if ($like === true)
            <p>Unlike</p>
        @elseif ($like === false)
            <p>Like</p>
        @else
            <P>nO NEED TO LIKE</P>
        @endif

    </div>
@endsection
