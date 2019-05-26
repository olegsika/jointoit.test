@extends('layouts.master')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Enter Employee First Name">
                @error('first_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Enter Employee Last Name">
                @error('last_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="company_id">Company</label>
                <select name="company_id" id="company_id" class="form-control">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter Employee Email">
            </div>
            <div class="form-group">
                <label for="Phone">Phone</label>
                <input name="phone" type="tel" class="form-control" id="phone" placeholder="Enter Employee phone">
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
