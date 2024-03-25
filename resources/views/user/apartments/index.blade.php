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
                <div class="p-3">
                    <span>New Apartment</span>
                    <a class="my-btn-sm" href="{{ route('user.apartment.create') }}"><i class="fa-solid fa-plus"></i></a>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="col-12">
                <table class="my-table">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Visible</th>
                            <th scope="col">Title</th>
                            <th scope="col">Address</th>
                            <th scope="col">Square meters</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apartments as $apartment)
                            <tr>
                                <th scope="row">{{ $apartment->user_id }}</th>
                                <td>{{ $apartment->visible }}</td>
                                <td>{{ $apartment->title }}</td>
                                <td>{{ $apartment->address }}</td>
                                <td>{{ $apartment->square_meters }}</td>
                                <td>{{ $apartment->slug }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a class="my-a-sm" href="{{ route('user.apartment.show', ['apartment' => $apartment->slug]) }}">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <a class="my-a-sm" href="">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button class="my-btn-sm">
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
@endsection
