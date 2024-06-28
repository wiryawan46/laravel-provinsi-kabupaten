@extends('layout')

@section('content')
    <h1>Kabupaten</h1>
    <a href="{{ route('kabupatens.create') }}">Add Kabupaten</a>
    <form method="GET" action="{{ route('kabupatens.index') }}">
        <select name="provinsi_id">
            <option value="">Filter by Provinsi</option>
            @foreach($provinsis as $provinsi)
                <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
            @endforeach
        </select>
        <input type="text" name="search" placeholder="Search by name">
        <button type="submit">Filter</button>
    </form>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Provinsi</th>
            <th>Population</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kabupatens as $kabupaten)
            <tr>
                <td>{{ $kabupaten->id }}</td>
                <td>{{ $kabupaten->name }}</td>
                <td>{{ $kabupaten->provinsi->name }}</td>
                <td>{{ $kabupaten->population }}</td>
                <td>
                    <a href="{{ route('kabupatens.edit', $kabupaten->id) }}">Edit</a>
                    <form action="{{ route('kabupatens.destroy', $kabupaten->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
