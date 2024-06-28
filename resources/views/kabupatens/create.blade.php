@extends('layout')

@section('content')
    <h1>Add Kabupaten</h1>
    <form action="{{ route('kabupatens.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="provinsi_id">Provinsi:</label>
        <select id="provinsi_id" name="provinsi_id" required>
            @foreach($provinsis as $provinsi)
                <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
            @endforeach
        </select>
        <label for="population">Population:</label>
        <input type="number" id="population" name="population" required>
        <button type="submit">Save</button>
    </form>
@endsection
