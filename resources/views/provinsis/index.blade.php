@extends('layout')

@section('content')
    <h1>Provinsi</h1>
    <a href="{{ route('provinsis.create') }}">Add Provinsi</a>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($provinsis as $provinsi)
            <tr>
                <td>{{ $provinsi->id }}</td>
                <td>{{ $provinsi->name }}</td>
                <td>
                    <a href="{{ route('provinsis.edit', $provinsi->id) }}">Edit</a>
                    <form action="{{ route('provinsis.destroy', $provinsi->id) }}" method="POST" style="display:inline">
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
