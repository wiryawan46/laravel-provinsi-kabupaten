@extends('layout')

@section('content')
    <h1>Edit Provinsi</h1>
    <form action="{{ route('provinsis.update', $provinsi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $provinsi->name }}" required>
        <button type="submit">Update</button>
    </form>
@endsection
