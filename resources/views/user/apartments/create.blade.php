@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-3">
                <h4>- ADD YOUR APARTMENT -</h4>
            </div>
        </div>

        {{-- DISPLAY SUMMIT DI ERRORI --}}
        <div class="col-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        {{-- FORM --}}
        <div class="col-12">
            <form action="{{ route('user.apartment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-6 border rounded-2 p-3">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- 
                        <div class="form-group">
                            <label for="visible" class="form-label">visible</label>
                            <input type="text" name="visible" id="visible" class="form-control" required
                                class="form-control @error('visible') is-invalid @enderror" value="{{ old('visible') }}">
                            @error('visible')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <div class="form-group mt-3">
                            <label for="cover_img">Choose the apartment's image:</label>
                            <input type="file" name="cover_img" id="cover_img"
                                class="form-control @error('cover_img') is-invalid @enderror"
                                value="{{ old('cover_img') }}">
                            @error('cover_img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class <div class="form-group mt-3">
                            <label for="rooms" class="form-label">N. of rooms</label>
                            <input type=rooms" name="rooms" id="rooms" class="form-control" required
                                class="form-control @error('rooms') is-invalid @enderror" value="{{ old('rooms') }}">
                            @error('rooms')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="beds" class="form-label">N. of beds</label>
                            <input type=beds" name="beds" id="beds" class="form-control" required
                                class="form-control @error('beds') is-invalid @enderror" value="{{ old('beds') }}">
                            @error('beds')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="bathrooms" class="form-label">N. of bathrooms</label>
                            <input type=bathrooms" name="bathrooms" id="bathrooms" class="form-control" required
                                class="form-control @error('bathrooms') is-invalid @enderror"
                                value="{{ old('bathrooms') }}">
                            @error('bathrooms')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="square_meters" class="form-label">N. of square meters</label>
                            <input type=square_meters" name="square_meters" id="square_meters" class="form-control" required
                                class="form-control @error('square_meters') is-invalid @enderror"
                                value="{{ old('square_meters') }}">
                            @error('square_meters')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="address" class="form-label">Address</label>
                            <input type=address" name="address" id="address" class="form-control" required
                                class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="my-btn-sm">Aggiungi</button>
            </form>
        </div>
    </div>
@endsection
