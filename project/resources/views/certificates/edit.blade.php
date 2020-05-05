@extends('layouts.loged')

@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ 'Update certificate' }}</h1>
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
            <form action="{{route('certificates.update')}}" method = "post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="company">Company:</label>
                    <select class="form-control" name="company">
                        @foreach(\App\Models\Company::all() as $company)
                            <option @if($company->id === $certificate->company_id) selected @endif value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Domain:</label>
                    <input type="text" name="domain" id="domain" class="form-control" required value="{{ $certificate->domain }}">
                </div>
                <div class="form-group">
                    <label for="name">Url:</label>
                    <input type="text" name="url" id="url" class="form-control" required value="{{ $certificate->url }}">
                </div>
                <div class="form-group">
                    <label for="name">Importance:</label>
                    <input name="importance" id="importance" class="form-control date-picker" data-provide="datepicker"  value="{{ $certificate->importance }}">
                </div>
                <div class="form-group">
                    <label class="d-block" for="name">Image:</label>
                    <input type="file" name="image" id="image">
                </div>
                <div class="form-group">
                    @if($certificate->image)
                        <p>Uploaded image:</p>
                        <img class="img-fluid" src="{{asset('storage/certs/'.$certificate->image)}}">
                    @endif
                </div>
                <input type="hidden" name="id" value = "{{$certificate->id}}">
                <button type="submit" class="btn btn-success mb-2">Submit</button>
            </form>
        </div>
    </div>


@endsection
