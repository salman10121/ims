@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">AJAX CRUD - AjaxPractice</h2>

    <form id="ajaxForm">
        @csrf
        <input type="hidden" id="record_id">

        <div class="form-group mb-2">
            <label>Name</label>
            <input type="text" id="name" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Email</label>
            <input type="email" id="email" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Phone</label>
            <input type="text" id="phone" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Address</label>
            <textarea id="address" class="form-control"></textarea>
        </div>

        <div class="form-group mb-2">
            <label>Status</label>
            <select id="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>

    <hr>

    <h4>Record List</h4>
    <table class="table table-bordered mt-3" id="dataTable">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th width="20%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $key => $record)
                <tr id="row_{{ $record->id }}">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->email }}</td>
                    <td>{{ $record->phone }}</td>
                    <td>{{ $record->address }}</td>
                    <td>{{ $record->status }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm editBtn" data-id="{{ $record->id }}">Edit</button>
                        <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $record->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- AJAX Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function(){

    // Save or Update
    $('#ajaxForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ route('ajaxpractice.store') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: $('#record_id').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                address: $('#address').val(),
                status: $('#status').val(),
            },
            success: function(res){
                alert(res.success);
                location.reload();
            }
        });
    });

    // Edit
    $('.editBtn').on('click', function(){
        let id = $(this).data('id');
        $.get("{{ url('ajaxpractice') }}/" + id + "/edit", function(res){
            $('#record_id').val(res.id);
            $('#name').val(res.name);
            $('#email').val(res.email);
            $('#phone').val(res.phone);
            $('#address').val(res.address);
            $('#status').val(res.status);
        });
    });

    // Delete
    $('.deleteBtn').on('click', function(){
        if(confirm("Are you sure?")){
            let id = $(this).data('id');
            $.ajax({
                url: "{{ url('ajaxpractice') }}/" + id,
                type: "DELETE",
                data: {_token: "{{ csrf_token() }}"},
                success: function(res){
                    alert(res.success);
                    $("#row_" + id).remove();
                }
            });
        }
    });

});
</script>
@endsection
