@extends('layouts.app')

@section('content')
    index

    <div class="col-12 d-flex justify-content-between align-items-center my-2 px-3">
        <p><strong>Create yours: </strong></p>
        <a class="my_button" href="{{ route('user.apartment.create') }}"><i class="fa-solid fa-plus"></i></a>
    </div>
@endsection
