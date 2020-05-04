@extends('layouts.loged')

@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ 'Create company' }}</h1>
    </div>

@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <span>{{$errors->first()}}</span>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <form action="{{route('companies.store')}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>


@endsection
