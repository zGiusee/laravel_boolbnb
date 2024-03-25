@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="box-card-long mb-5 d-none d-sm-block">
            <div class="card-md-description d-flex justify-content-between">
                <span>Modifica: {{ $apartment->title }}</span>
                <div>
                    <a href="{{ route('user.apartments.index') }}" class="btn btn-primary me-2">Torna all'elenco
                        appartamenti</button>
                        <a href="{{ route('user.home') }}" class="btn heavenly">Torna alla dashboard</a>
                </div>
            </div>
        </div>


        <div class="box-card-long ">
            <form action="{{ route('user.apartments.update', $apartment) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PUT')

                {{-- Title --}}
                <div class="mb-3 input-boolbnb">
                    <label class="form-label" for="title">Titolo</label>
                    <input type="text" class="form-control w-75 @error('title') is-invalid @enderror"
                        value="{{ old('title', $apartment->title) }}" id="title" name="title"
                        placeholder="Inserisci un titolo" required onblur="validateTitle()">
                    <span id="title-error"></span>
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Cover Image --}}
                <div class="mb-3 input-boolbnb">

                    <label class="form-label" for="cover_image">Immagine di Copertina</label>


                    <div class="img-preview position-relative d-flex justify-content-center align-items-center p-3"
                        title="Aggiungi un immagine" onclick="openfile()">
                        <img id="img-preview" src="{{ $src }}" alt="" width="100">
                        <div class="position-absolute" id="img-clear" onclick="clearImg(event)">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>

                    <input type="file" class="form-control w-75 @error('cover_image') is-invalid @enderror"
                        id="cover_image" name="cover_image" value="{{ old('cover_image', $apartment->cover_image) }}"
                        placeholder="Inserisci un'immagine di copertina" onchange="showImg(event)">
                    <span id="img-error"></span>
                    @error('cover_image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
                {{-- rooms --}}
                <div class="mb-3 input-boolbnb">
                    <label class="form-label" for="rooms">Stanze</label>
                    <input type="text" class="form-control w-75 @error('rooms') is-invalid @enderror"
                        value="{{ old('rooms', $apartment->n_rooms) }}" id="rooms" name="rooms"
                        onblur="validateRooms()">
                    <span id="rooms-error"></span>
                    @error('rooms')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- beds --}}
                <div class="mb-3 input-boolbnb">
                    <label class="form-label" for="n_beds">Letti</label>
                    <input type="text" class="form-control w-75 @error('beds') is-invalid @enderror"
                        value="{{ old('beds', $apartment->beds) }}" id="beds" name="beds" onblur="validateBed()">
                    <span id="bed-error"></span>
                    @error('beds')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- bathrooms --}}
                <div class="mb-3 input-boolbnb">
                    <label class="form-label" for="bathrooms">Bagni</label>
                    <input type="text" class="form-control w-75 @error('Bathrooms') is-invalid @enderror"
                        value="{{ old('Bathrooms', $apartment->bathrooms) }}" id="bathrooms" name="bathrooms"
                        onblur="validateBath()">
                    <span id="n-bath-error"></span>
                    @error('bathrooms')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- square_meters --}}

                <div class="mb-3 input-boolbnb">
                    <label class="form-label" for="square_meters">Metri quadri</label>
                    <input type="text" class="form-control w-75 @error('square_meters') is-invalid @enderror"
                        value="{{ old('square_meters', $apartment->square_meters) }}" id="square_meters"
                        name="square_meters" onblur="validateMeters()">
                    <span id="meters-error"></span>
                    @error('square_meters')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Address --}}
                <div class="mb-3" id="searchbox">
                    <label class="form-label" for="address">Indirizzo</label>
                    <span id="address-error"></span>
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Toggle visible --}}
                <div class="visible-check mb-3 form-check form-switch">
                    <label class="form-label" for="visible">Rendi visibile il tuo appartamento</label>
                    <input type="checkbox" class="form-control form-check-input" role="switch" id="is_visible"
                        name="visible" value="1" @if (old('visible', $apartment->visible)) checked @endif>
                </div>

                <button type="submit" class="btn btn-primary">Conferma modifica</button>
            </form>
        </div>

    </div>
@endsection
