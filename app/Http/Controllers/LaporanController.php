<?php

namespace App\Http\Controllers;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Laporan jumlah penduduk per provinsi
    public function laporanPerProvinsi()
    {
        $provinsis = Provinsi::with('kabupatens')->get();
        return view('laporan.provinsi', compact('provinsis'));
    }

    // Laporan jumlah penduduk per kabupaten dengan filter per provinsi
    public function laporanPerKabupaten(Request $request)
    {
        $provinsi_id = $request->input('provinsi_id');
        $provinsis = Provinsi::all();

        $kabupatens = Kabupaten::with('provinsi')
            ->when($provinsi_id, function ($query) use ($provinsi_id) {
                return $query->where('provinsi_id', $provinsi_id);
            })
            ->get();

        return view('laporan.kabupaten', compact('kabupatens', 'provinsis', 'provinsi_id'));
    }
}
