@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            {{-- TITLE --}}
            <div class="col-12">
                <h1 class="my-title p-3">Your Messages</h1>
            </div>

            {{-- ADDING BUTTONS --}}
            <div class="col-12">
                <div class="p-3 d-flex justify-content-between align-items-center">
                    <a class="my-btn-sm" href="{{ route('user.dashboard') }}"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="col-12">
                <table class="my-table">


                    <thead>
                        <tr>
                            <th scope="col" class="text-center"><i class="fas fa-heading my-icon-form me-2"></i>
                                Apartment Title
                            </th>
                            <th scope="col" class="text-center"><i class="fa-regular fa-user my-icon-form me-2"></i>
                                Visitor Name</th>
                            <th scope="col" class="text-center"><i class="fa-regular fa-user -alt my-icon-form me-2"></i>
                                Visitor Email</th>
                            <th scope="col" class="text-center"><i class="fas fa-pen my-icon-form me-2"></i>
                                Description
                            </th>
                            <th scope="col" class="text-center"><i class="fas fa-pen my-icon-form me-2"></i>
                                Date
                            </th>
                            <th scope="col" class="text-center"><i class="fas fa-tools my-icon-form me-2"></i> Tools</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td class="text-center"><a
                                        href="{{ route('user.apartment.show', ['apartment' => $message->slug]) }}">{{ $message->title }}</a>
                                </td>
                                <td class="text-center">{{ $message->name }}</td>
                                <td class="text-center">{{ $message->email }}</td>
                                <td class="text-center">{{ Str::limit($message->description, 25, '...') }}</td>
                                <td class="text-center">{{ $message->date }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <button type="button" class="my-btn-sm my_detail_button" data-bs-toggle="modal"
                                        data-bs-target="#detail_modal" data-email="{{ $message->email }}"
                                        data-apartment="{{ $message->title }}" data-date="{{ $message->date }}"
                                        data-description="{{ $message->description }}">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </button>
                                    <button type="button" class="my-btn-sm my_delete_button" data-bs-target="#delete_modal"
                                        data-bs-toggle="modal" data-slug="{{ $message->id }}"
                                        data-info="{{ $message->name }}" data-type="message">
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
    @include('user.partials.detail_modal')
    @include('user.partials.delete_modal')
@endsection
