@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Appointments</h2>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>No Telp</th>
            <th>Reservation Date</th>
            <th>Reservation Time</th>
            <th>Category</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($appointments as $appointment)
        <tr>
            <td>{{ $appointment->name }}</td>
            <td>{{ $appointment->no_tlp }}</td>
            <td>{{ $appointment->reservation_date }}</td>
            <td>{{ $appointment->reservation_time }}</td>
            <td>{{ $appointment->category->name }}</td>
            <td>{{ $appointment->status ? 'Sudah Dibayar' : 'Belum Bayar' }}</td>
            <td>
                <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection