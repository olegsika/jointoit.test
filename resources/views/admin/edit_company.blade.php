@extends('layouts.master')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter company name" value="{{$company->name}}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter company Email" value="{{$company->email}}">
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input name="logo" type="file" class="form-control" id="logo" value="{{$company->logo}}">
                <img src="{{ URL::to('/')}}/storage/{{$company->logo}}" class="img-thumbnail" width="100">
                <input type="hidden" name="hidden_image" value="{{ $company->logo }}" />
                @error('logo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input name="website" type="text" class="form-control" id="website" placeholder="Enter company website" value="{{$company->website}}">
            </div>



            <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
        </form>
    </div>
@endsection
