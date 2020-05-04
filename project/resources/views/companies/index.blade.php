@extends('layouts.loged')

@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ 'Companies' }}</h1>
    </div>
    <div class="col-sm-6">
        <div class="float-sm-right">
            <a href="{{ url('/companies/create') }}">Add new</a>
        </div>
    </div>

@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

   companies

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
