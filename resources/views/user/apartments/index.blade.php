@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            {{-- TITLE --}}
            <div class="col-12">
                <h1 class="my-title p-3">Your Apartments</h1>
            </div>

            {{-- ADDING BUTTONS --}}
            <div class="col-12">
                <div class="p-3 d-flex justify-content-between align-items-center">
                    <a class="my-btn-sm" href="{{ route('user.dashboard') }}"><i class="fas fa-arrow-left"></i></a>
                    <a class="my-btn-sm" href="{{ route('user.apartment.create') }}">Add Apartment</a>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="col-12">
                <table class="my-table">

                    <thead>
                        <tr>
                            <th scope="col" class="text-center"><i class="fas fa-eye my-icon-form me-2"></i> Visible</th>
                            <th scope="col" class="text-center"><i class="fas fa-heading my-icon-form me-2"></i> Title
                            </th>
                            <th scope="col" class="text-center"><i class="fas fa-map-marker-alt my-icon-form me-2"></i>
                                Address</th>
                            <th scope="col" class="text-center"><i class="fas fa-ruler my-icon-form me-2"></i> Square
                                meters
                            </th>
                            <th scope="col" class="text-center"><i class="fas fa-tools my-icon-form me-2"></i> Tools</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($apartments as $apartment)
                            <tr>
                                <td class="text-center">{{ $apartment->visible ? 'yes' : 'no' }}</td>
                                <td class="text-center">{{ $apartment->title }}</td>
                                <td class="text-center">{{ $apartment->address }}</td>
                                <td class="text-center">{{ $apartment->square_meters }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a class="my-a-sm"
                                        href="{{ route('user.apartment.show', ['apartment' => $apartment->slug]) }}">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <a class="my-a-sm"
                                        href="{{ route('user.apartment.edit', ['apartment' => $apartment->slug]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button type="button" class="my-btn-sm my_delete_button" data-bs-target="#delete_modal"
                                        data-bs-toggle="modal" data-slug="{{ $apartment->slug }}"
                                        data-title="{{ $apartment->title }}" data-type="apartment">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
    @include('user.partials.delete_modal')
@endsection
