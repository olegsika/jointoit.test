@extends('layouts.master')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter company name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter company Email">
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input name="logo" type="file" class="form-control" id="logo">
                @error('logo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input name="website" type="text" class="form-control" id="website" placeholder="Enter company website">
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
