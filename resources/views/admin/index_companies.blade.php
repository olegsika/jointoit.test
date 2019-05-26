@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Companies</h2>
        <br>
        <a href="{{ route('companies.create') }}" class="btn btn-info ml-3" id="create-new-company">Add New</a>
        <br><br>
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Logo</th>
                <th scope="col">Website</th>
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
                    url: "{{ route('companies.index') }}",
                    type: 'GET',
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'logo', name: 'logo', render: function (data, type, full, meta) {
                            return "<img src={{URL::to('/')}}/storage/" + data + " width='70' class='img-thumbnail' />";
                        }, orderable: false},
                    {data: 'website', name: 'website'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
            });
        });
    </script>
@endsection