@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <h1 class="my-title">Your Apartments</h1>
            </div>
            <div class="col-12">
                <table class="my-table">
                    <tr>
                        <th>Id</th>
                        <th>Visible</th>
                        <th>Title</th>
                        <th>Address</th>
                        <th>Square meters</th>
                        <th>Slug</th>
                        <th>Tools</th>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                        <td>Germany</td>
                        <td>Centro comercial Moctezuma</td>
                        <td>Francisco Chang</td>
                        <td>Francisco Chang</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            <a href="">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button>
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Francisco Chang</td>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                        <td>Germany</td>
                        <td>Centro comercial Moctezuma</td>
                        <td>Francisco Chang</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            <a href="">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button>
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>

                </table>
            </div>

        </div>
    </div>
@endsection
