@extends('layout')

@section('content')
    <h1>Laporan Jumlah Penduduk Per Provinsi</h1>
    <table>
        <thead>
        <tr>
            <th>Provinsi</th>
            <th>Total Penduduk</th>
        </tr>
        </thead>
        <tbody>
        @foreach($provinsis as $provinsi)
            <tr>
                <td>{{ $provinsi->name }}</td>
                <td>
                    {{ $provinsi->kabupatens->sum('population') }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
