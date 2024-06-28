@extends('layout')

@section('content')
    <h1>Laporan Jumlah Penduduk Per Kabupaten</h1>
    <form method="GET" action="{{ route('laporan.kabupaten') }}">
        <select name="provinsi_id">
            <option value="">Filter by Provinsi</option>
            @foreach($provinsis as $provinsi)
                <option value="{{ $provinsi->id }}" {{ $provinsi_id == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->name }}</option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form>
    <table>
        <thead>
        <tr>
            <th>Kabupaten</th>
            <th>Provinsi</th>
            <th>Penduduk</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kabupatens as $kabupaten)
            <tr>
                <td>{{ $kabupaten->name }}</td>
                <td>{{ $kabupaten->provinsi->name }}</td>
                <td>{{ $kabupaten->population }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
