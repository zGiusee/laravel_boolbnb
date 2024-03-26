@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-3">
                <h4>EDIT YOUR APARTMENT</h4>
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


        {{-- FORM  --}}
        <div class="col-12 px-3">
            <form action="{{ route('user.apartment.update', $apartment->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row justify-content-center mb-5">
                    <div class="col-12 col-sm-8 col-lg-6 p-3">

                        {{-- Title --}}
                        <label class="form-label" for="title">Title</label>

                        <div class="input-group">
                            <span class="input-group-text bg-white" id="basic-addon1"><i
                                    class="fas fa-heading my-icon-form"></i></span>
                            <input type="text" class="form-control border-start-0 @error('title') is-invalid @enderror"
                                value="{{ old('title', $apartment->title) }}" id="title" name="title" required>

                            @error('title')
                                <p class="text-danger">{{ $message }} </p>
                            @enderror
                            @if (session('error_message'))
                                <div class="alert alert-danger">
                                    {{ session('error_message') }}
                                </div>
                            @endif
                        </div>

                        {{-- Cover Image --}}
                        <div class="form-group mt-1">
                            <label class="form-label" for="cover_image">Cover Image</label>

                            <div class="">
                                @if (Str::contains($apartment->cover_img, 'https'))
                                    <img class=" my-3" src="{{ $apartment->cover_img }}" alt="{{ $apartment->title }}"
                                        width="300">
                                @else
                                    <img class=" my-3" src="{{ asset('/storage/' . $apartment->cover_img) }}"
                                        alt="{{ $apartment->title }}" width="300">
                                @endif
                            </div>

                            <input type="file"
                                class="form-control border-start-0 @error('cover_img') is-invalid @enderror" id="cover_img"
                                name="cover_img" value="{{ old('cover_img', $apartment->cover_image) }}">

                            @error('cover_image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Address --}}
                        <div class="form-group mt-3">
                            <label class="form-label" for="address">Address</label>

                            <div id="myInput" old-value="{{ $apartment->address }}">
                                {{-- qui c'è la searchbar visibile --}}
                            </div>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        {{-- searchbar non visibile  --}}
                        <div class="form-group mt-3 d-none">
                            <input type="text" name="address" id="address" required
                                class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                        </div>


                        {{-- ROW PER NUMBERS OF... --}}
                        <div class="row mt-3">

                            {{-- rooms --}}
                            <div class="col-12 col-lg-3">
                                <label class="form-label" for="rooms">Rooms</label>

                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-door-open my-icon-form"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control border-start-0 @error('rooms') is-invalid @enderror"
                                        value="{{ old('rooms', $apartment->rooms) }}" id="rooms" name="rooms">
                                    @error('rooms')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- beds --}}
                            <div class="col-12 col-lg-3">
                                <label class="form-label" for="beds">Beds</label>

                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-bed my-icon-form"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control border-start-0 @error('beds') is-invalid @enderror"
                                        value="{{ old('beds', $apartment->beds) }}" id="beds" name="beds">
                                    @error('beds')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- bathrooms --}}
                            <div class="col-12 col-lg-3">
                                <label class="form-label" for="bathrooms">Bathrooms</label>

                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-toilet my-icon-form"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control border-start-0 @error('bathrooms') is-invalid @enderror"
                                        value="{{ old('bathrooms', $apartment->bathrooms) }}" id="bathrooms"
                                        name="bathrooms">
                                    @error('bathrooms')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- square_meters --}}

                            <div class="col-12 col-lg-3">
                                <label class="form-label" for="square_meters">Square Meters</label>

                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-ruler my-icon-form"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control border-start-0 @error('square_meters') is-invalid @enderror"
                                        value="{{ old('square_meters', $apartment->square_meters) }}" id="square_meters"
                                        name="square_meters">
                                    @error('square_meters')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            {{-- Toggle visible --}}
                            <div class="visible-check mt-3 form-check form-switch">
                                <label class="form-label" for="visible">Make your Apartment visibible</label>
                                <select name="visible" id="visible">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>


                            {{-- Bottone --}}
                            <div class="text-center">
                                <button type="submit" id="submitCreate"
                                    class="my-btn-sm mt-4 text-uppercase">Edit</button>
                            </div>
            </form>
        </div>

    </div>
@endsection
