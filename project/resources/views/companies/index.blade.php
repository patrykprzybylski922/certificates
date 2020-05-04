@extends('layouts.loged')

@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ 'Companies' }}</h1>
    </div>
    <div class="col-sm-6">
        <div class="float-sm-right">
            <a href="{{ url('/companies/create') }}"><button class="btn btn-primary">Add new</button></a>
        </div>
    </div>

@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width: 80px;">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td >
                                    <a href="{{ url('companies/edit/'.$company->id) }}"><i class="fa fa-edit"></i></a>
                                    <a class="ml-1" href="{{ url('companies/delete/'.$company->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            {{ $companies->links() }}
        </div>

    </div>

@endsection


