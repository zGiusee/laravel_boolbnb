@extends('layouts.app')

@section('content')

<div class="container back_color_gradient">
    <div class="row">
        <div class="col-12 py-5 px-5">
            <div class="text-center">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="d-flex justify-content-start main_title">{{ $apartment->title }}</h4>
                        </div>
                        <div class="col-6 d-flex justify-content-end pb-2">
                            <a class="my-a-sm" href="">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a class="my-a-sm" href="{{ route('user.apartment.index', ['apartment' => $apartment->slug]) }}">
                                <i class="fa-solid fa-x"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="card-body cover">
                            <img src="{{ $apartment->cover_img }}" alt="" width="400">
                        </div>
                        <div class="d-flex justify-content-start text-body-secondary pb-0 pt-1">
                            <p>{{ $apartment->latitude }}, {{ $apartment->longitude }}</p>
                          </div>
                    </div>
                    <div class="col-7">
                        <div class="row">
                            <div class="col-3">
                                <p class="d-flex justify-content-start bottom_line"><strong>Address</strong></p>
                                <p class="d-flex justify-content-start bottom_line"><strong>Square Meters</strong></p>
                                <p class="d-flex justify-content-start bottom_line"><strong>Bathrooms</strong></p>
                                <p class="d-flex justify-content-start bottom_line"><strong>Rooms</strong></p>
                                <p class="d-flex justify-content-start bottom_line"><strong>Bads</strong></p>
                            </div>
                            {{-- <div class="col-3">
                                <p class="d-flex justify-content-start "><strong>:</strong></p>
                                <p class="d-flex justify-content-start "><strong>:</strong></p>
                                <p class="d-flex justify-content-start "><strong>:</strong></p>
                                <p class="d-flex justify-content-start "><strong>:</strong></p>
                                <p class="d-flex justify-content-start "><strong>:</strong></p>
                                <p class="d-flex justify-content-start "><strong>:</strong></p>
                            </div> --}}
                            <div class="col-9">
                                <p class="d-flex justify-content-start bottom_line">{{ $apartment->address }}</p>
                                <p class="d-flex justify-content-start bottom_line">{{ $apartment->square_meters }}</p>
                                <p class="d-flex justify-content-start bottom_line">{{ $apartment->bathrooms }}</p>
                                <p class="d-flex justify-content-start bottom_line">{{ $apartment->rooms }}</p>
                                <p class="d-flex justify-content-start bottom_line">{{ $apartment->beds }}</p>
                                {{-- <p class="d-flex justify-content-start">{{ $apartment->visible }}</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection