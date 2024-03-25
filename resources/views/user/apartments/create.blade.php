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
                <div class="row justify-content-center mb-5">
                    <div class="col-12 col-sm-8 col-lg-6 p-3">

                        <label for="title" class="form-label">Title</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white" id="basic-addon1"><i
                                    class="fas fa-heading my-icon-form"></i></span>
                            <input type="text" name="title" id="title" placeholder="Es: La casa sul lago"
                                class="form-control border-start-0 @error('title') is-invalid @enderror" required
                                value="{{ old('title') }}">
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
                            <label for="cover_img" class="form-label">Choose the apartment's image</label>

                            <input type="file" name="cover_img" id="cover_img" required
                                class="form-control @error('cover_img') is-invalid @enderror"
                                value="{{ old('cover_img') }}">
                            @error('cover_img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="address" class="form-label mb-0">Address</label>
                            <div id="myInput" class="rounded-3">

                            </div>

                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ROW PER NUMBERS OF... --}}
                        <div class="row mt-3">
                            <div class="col-6 col-lg-3">
                                <label for="rooms" class="form-label">Rooms</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-door-open my-icon-form"></i></span>
                                    <input type="text" name="rooms" id="rooms" placeholder="Es: 2" required
                                        class="form-control border-start-0 @error('rooms') is-invalid @enderror"
                                        value="{{ old('rooms') }}">
                                    @error('rooms')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 col-lg-3">
                                <label for="beds" class="form-label">Beds</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-bed my-icon-form"></i></span>
                                    <input type="text" name="beds" id="beds" placeholder="Es: 3" required
                                        class="form-control border-start-0 @error('beds') is-invalid @enderror"
                                        value="{{ old('beds') }}">
                                    @error('beds')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 col-lg-3">
                                <label for="bathrooms" class="form-label">Bathrooms</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-toilet my-icon-form"></i></span>
                                    <input type="text" name="bathrooms" id="bathrooms" placeholder="Es: 2" required
                                        class="form-control border-start-0 @error('bathrooms') is-invalid @enderror"
                                        value="{{ old('bathrooms') }}">
                                    @error('bathrooms')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-6 col-lg-3">
                                <label for="square_meters" class="form-label">m²</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-ruler my-icon-form"></i></span>
                                    <input type="text" name="square_meters" id="square_meters" placeholder="Es: 100m² "
                                        required
                                        class="form-control border-start-0 @error('square_meters') is-invalid @enderror"
                                        value="{{ old('square_meters') }}">
                                    @error('square_meters')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>





                        <div class="form-group mt-3 d-none">
                            <label for="address" class="form-label">Address</label>

                            <input type="text" name="address" id="address" required
                                class="my-input @error('address') is-invalid @enderror" value="{{ old('address') }}">
                        </div>

                        {{-- 
                        @if (count($address) > 0)
                            <span>forse intendevi questo indirizzo? :</span>
                        @endif
                        @forelse ($address as $item)
                            <div>{{ $item }}</div>
                        @empty
                        @endforelse --}}

                        <div class="text-center">
                            <button type="submit" id="submitCreate"
                                class="my-btn-sm mt-4 text-uppercase">submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
