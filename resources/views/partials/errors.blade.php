@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger position-fixed alert-dismissible fade show" role="alert"
            style="top: 30%; right: 20px; z-index: 9999;">
            <strong> {{ $error }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif


@if ($message = Session::get('success'))
    <div class="alert alert-success position-fixed alert-dismissible fade show" role="alert"
        style="top: 30%; right: 20px; z-index: 9999;">
        <strong> {{ $message }} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
