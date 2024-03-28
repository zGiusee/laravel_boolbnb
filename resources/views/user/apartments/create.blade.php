@extends('layouts.app')

@section('content')
    <div class="m-5">
        <a class="my-btn-sm" href="{{ route('user.apartment.index') }}"><i class="fas fa-arrow-left">
            </i></a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-3">
                <h4>- ADD YOUR APARTMENT -</h4>
            </div>
        </div>

        {{-- DISPLAY SUMMIT DI ERRORI --}}
        {{-- <div class="col-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div> --}}

        {{-- FORM --}}
        <div class="col-12 px-3">
            <form action="{{ route('user.apartment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center mb-5">
                    <div class="col-12 col-sm-8 col-lg-6 p-3">

                        <label for="title" class="form-label">Title</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white" id="basic-addon1"><i
                                    class="fas fa-heading my-icon-form"></i></span>
                            <input maxlength="100" required type="text" name="title" id="title" placeholder="Es: La casa sul lago"
                                class="form-control border-start-0 @error('title') is-invalid @enderror" required
                                value="{{ old('title') }}">
                        </div>
                        <div>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="cover_img" class="form-label">Choose the apartment's image</label>

                            <input type="file" name="cover_img" id="cover_img" required
                                class="form-control @error('cover_img') is-invalid @enderror"
                                value="{{ old('cover_img') }}">
                        </div>
                        <div>
                            @error('cover_img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="address" class="form-label mb-0">Address</label>

                            <div id="myInput">

                            </div>
                        </div>
                        <div>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            @if (session('error_message'))
                                <div class="alert alert-danger">
                                    {{ session('error_message') }}
                                </div>
                            @endif
                        </div>

                        {{-- ROW PER NUMBERS OF... --}}
                        <div class="row mt-3">
                            <div class="col-12 col-lg-3">
                                <label for="rooms" class="form-label">Rooms</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-door-open my-icon-form"></i></span>
                                    <input required type="text" name="rooms" id="rooms" placeholder="Es: 2" required
                                        class="form-control border-start-0 @error('rooms') is-invalid @enderror"
                                        value="{{ old('rooms') }}">
                                </div>
                            </div>
                            <div>
                                @error('rooms')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-3">
                                <label for="beds" class="form-label">Beds</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-bed my-icon-form"></i></span>
                                    <input required type="text" name="beds" id="beds" placeholder="Es: 3" required
                                        class="form-control border-start-0 @error('beds') is-invalid @enderror"
                                        value="{{ old('beds') }}">
                                </div>
                            </div>
                            <div>
                                @error('beds')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-3">
                                <label for="bathrooms" class="form-label">Bathrooms</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-toilet my-icon-form"></i></span>
                                    <input required type="text" name="bathrooms" id="bathrooms" placeholder="Es: 2" required
                                        class="form-control border-start-0 @error('bathrooms') is-invalid @enderror"
                                        value="{{ old('bathrooms') }}">
                                </div>
                            </div>
                            <div>
                                @error('bathrooms')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-12 col-lg-3">
                                <label for="square_meters" class="form-label">m²</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white" id="basic-addon1"><i
                                            class="fas fa-ruler my-icon-form"></i></span>
                                    <input maxlength="15" required type="text" name="square_meters" id="square_meters" placeholder="Es: 100m² "
                                        required
                                        class="form-control border-start-0 @error('square_meters') is-invalid @enderror"
                                        value="{{ old('square_meters') }}">
                                </div>
                            </div>
                            <div>
                                @error('square_meters')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3 d-none">
                            <label for="address" class="form-label">Address</label>

                            <input maxlength="100" required type="text" name="address" id="address" required
                                class="my-input @error('address') is-invalid @enderror" value="{{ old('address') }}">
                        </div>


                        <div class="col-12 col-lg-3 mt-3 w-100">
                            <label for="services" class="form-label">Services</label>
                            <div class="btn-group dropend mx-3">
                                <button type="button" class="my-btn-select-service mx-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    service
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="px-3">
                                        @foreach ($services as $service)
                                            <div class="form-check-inline check_service">
                                                <input type="checkbox" name="services[]" id="service-{{ $service->id }}" class="form-check-input" value="{{ $service->id }}" @checked(is_array(old('services')) && in_array($service->id, old('services')))>
                                                <label for="" class="form-check-label">{{ $service->name }}</label>
                                            </div>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        {{-- Toggle visible --}}
                        <div class="col-12 col-lg-6 mt-3">
                            <div class="visible-check mt-3 form-check px-0 form-switch">
                                <label class="form-label" for="visible">Show your apartment</label>
                                <select name="visible" id="visible" class="my-btn-select">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" id="submitCreate"
                                class="my-btn-sm mt-4 text-uppercase">submit</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
