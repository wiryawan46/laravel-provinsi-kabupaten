@extends('layout')

@section('content')
    <h1>Edit Kabupaten</h1>
    <form action="{{ route('kabupatens.update', $kabupaten->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $kabupaten->name }}" required>
        <label for="provinsi_id">Provinsi:</label>
        <select id="provinsi_id" name="provinsi_id" required>
            @foreach($provinsis as $provinsi)
                <option value="{{ $provinsi->id }}" {{ $provinsi->id == $kabupaten->provinsi_id ? 'selected' : '' }}>{{ $provinsi->name }}</option>
            @endforeach
        </select>
        <label for="population">Population:</label>
        <input type="number" id="population" name="population" value="{{ $kabupaten->population }}" required>
        <button type="submit">Update</button>
    </form>
@endsection
