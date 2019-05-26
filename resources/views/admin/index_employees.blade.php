@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Employees</h2>
        <br>
        <a href="{{ route('employees.create') }}" class="btn btn-info ml-3" id="create-new-company">Add New</a>
        <br><br>
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Company</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        var SITEURL = '{{URL::to('')}}';
        $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('employees.index') }}",
                    type: 'GET',
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'first_name', name: 'name_first'},
                    {data: 'last_name', name: 'last_first'},
                    {data: 'company_id', name: 'company_id'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
            });
        });
    </script>
@endsection
