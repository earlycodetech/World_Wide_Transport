@extends('layouts.app')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
      
            <form method="POST" enctype="multipart/form-data" action="{{ route('user.profile.update') }}" class="row">
                @csrf @method('PATCH')
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset(Auth::user()->picture) }}"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                            <h5 class="my-3"> {{ Auth::user()->name }} </h5>
                            <p class="text-muted mb-1"> {{ Auth::user()->email }} </p>
                            <p class="text-muted mb-4">{{ Auth::user()->address }}</p>
                            <div class="d-flex justify-content-center mb-2">
                               <input type="file" name="picture" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 my-3">

                    <div class="card mb-4">
                        <div class="card-header text-end">
                            <a href="{{ route('user.bookings') }}" class="btn btn-primary">
                                My Bookings
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control bg-white">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" disabled  value="{{ Auth::user()->email }}" class="form-control bg-white">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" value="{{ Auth::user()->phone_number }}" class="form-control bg-white">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Next of Kin </p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="next_of_kin" value="{{ Auth::user()->nok }}" class="form-control bg-white">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Next of Kin Phone Number </p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="next_of_kin_phone_number" value="{{ Auth::user()->nok_phone }}" class="form-control bg-white">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="address" value="{{ Auth::user()->address }}" class="form-control bg-white">
                                </div>
                            </div>

                            <button class="btn btn-primary"> Update </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
