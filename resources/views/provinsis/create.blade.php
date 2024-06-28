@extends('layout')

@section('content')
    <h1>Add Provinsi</h1>
    <form action="{{ route('provinsis.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Save</button>
    </form>
@endsection
