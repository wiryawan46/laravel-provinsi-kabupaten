<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $provinsi_id = $request->input('provinsi_id');
        $search = $request->input('search');
        $kabupatens = Kabupaten::with('provinsi')
            ->when($provinsi_id, function ($query) use ($provinsi_id) {
                return $query->where('provinsi_id', $provinsi_id);
            })
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->get();
        $provinsis = Provinsi::all();
        return view('kabupatens.index', compact('kabupatens', 'provinsis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsis = Provinsi::all();
        return view('kabupatens.create', compact('provinsis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'provinsi_id' => 'required',
            'population' => 'required|integer',
        ]);

        Kabupaten::query()->create($request->all());
        return redirect()->route('kabupatens.index')
            ->with('success', 'Kabupaten created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kabupaten $kabupaten)
    {
        $provinsis = Provinsi::all();
        return view('kabupatens.edit', compact('kabupaten', 'provinsis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {
        $request->validate([
            'name' => 'required',
            'provinsi_id' => 'required',
            'population' => 'required|integer',
        ]);

        $kabupaten->update($request->all());
        return redirect()->route('kabupatens.index')
            ->with('success', 'Kabupaten updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();
        return redirect()->route('kabupatens.index')
            ->with('success', 'Kabupaten deleted successfully.');
    }
}
