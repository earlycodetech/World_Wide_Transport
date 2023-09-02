@extends('layouts.app')
@section('content')
    <section style="background-image: url({{ asset('images/anita.jpg') }});">
        <div class="container">
            <img src="{{ URL('images/anita.jpg') }}" height="200" alt="" class="w-100 mb-3">

            <img src="{{ asset('images/anita.jpg') }}" width="100" alt="">
        </div>
    </section>
@endsection