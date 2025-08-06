@extends('layout.app')

@section('content')
<!-- layout.app -->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    ...
</head>

<div class="container">
    <h2 class="mb-4">AjaxPractice - AJAX CRUD</h2>

    <form id="ajaxForm">
        @csrf
        <input type="hidden" id="id">

        <div class="mb-2">
            <input type="text" id="name" placeholder="Name" class="form-control" required>
        </div>
        <div class="mb-2">
            <input type="email" id="email" placeholder="Email" class="form-control" required>
        </div>
        <div class="mb-2">
            <input type="text" id="phone" placeholder="Phone" class="form-control">
        </div>
        <div class="mb-2">
            <textarea id="address" placeholder="Address" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <select id="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <hr>

    <table class="table table-bordered" id="ajaxTable">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Status</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr id="row_{{ $item->id }}">
                <td>{{ $item->id }}</td>
                <td class="td-name">{{ $item->name }}</td>
                <td class="td-email">{{ $item->email }}</td>
                <td class="td-phone">{{ $item->phone }}</td>
                <td class="td-address">{{ $item->address }}</td>
                <td class="td-status">{{ $item->status }}</td>
                <td>
                    <button class="btn btn-sm btn-warning editBtn" data-id="{{ $item->id }}">Edit</button>
                    <button class="btn btn-sm btn-danger deleteBtn" data-id="{{ $item->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#ajaxForm').on('submit', function(e) {
    e.preventDefault();

    let id = $('#id').val();
    let url = id ? `/ajax-practice/${id}` : `{{ route('ajax-practice.store') }}`;
    let formData = {
        name: $('#name').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        address: $('#address').val(),
        status: $('#status').val()
    };

    if (id) {
        formData._method = 'PUT';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(res) {
            location.reload();
        },
        error: function(xhr) {
            console.log('Full error:', xhr);
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                alert(JSON.stringify(xhr.responseJSON.errors));
            } else if (xhr.responseText) {
                alert(xhr.responseText);
            } else {
                alert('An unknown error occurred');
            }
        }
    });
});

$('.editBtn').click(function() {
    let id = $(this).data('id');

    $.get(`/ajax-practice/${id}/edit`, function(data) {
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#email').val(data.email);
        $('#phone').val(data.phone);
        $('#address').val(data.address);
        $('#status').val(data.status);
    });
});

$('.deleteBtn').click(function() {
    let id = $(this).data('id');

    if (confirm("Are you sure to delete?")) {
        $.ajax({
            url: `/ajax-practice/${id}`,
            type: 'POST',
            data: {
                _method: 'DELETE',
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
                $('#row_' + id).remove();
            },
            error: function(xhr) {
                alert('Delete failed. Check console.');
                console.log(xhr);
            }
        });
    }
});
</script>
@endsection
