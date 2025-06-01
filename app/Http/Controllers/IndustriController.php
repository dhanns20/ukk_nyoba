<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industri;

class IndustriController extends Controller
{
    public function index()
    {
        return response()->json(Industri::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'bidang_usaha'    => 'required|string|max:255',
            'alamat'          => 'required|string',
            'kontak'          => 'required|string|max:255',
            'email'           => 'nullable|email|max:255',
            'guru_pembimbing' => 'required|exists:gurus,id',
        ]);

        $industri = Industri::create($validated);

        return response()->json($industri, 201);
    }

    public function show($id)
    {
        $industri = Industri::find($id);
        if (!$industri) {
            return response()->json(['message' => 'Industri tidak ditemukan'], 404);
        }
        return response()->json($industri);
    }

    public function update(Request $request, $id)
    {
        $industri = Industri::find($id);
        if (!$industri) {
            return response()->json(['message' => 'Industri tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'bidang_usaha'    => 'required|string|max:255',
            'alamat'          => 'required|string',
            'kontak'          => 'required|string|max:255',
            'email'           => 'nullable|email|max:255',
            'guru_pembimbing' => 'required|exists:gurus,id',
        ]);

        $industri->update($validated);

        return response()->json($industri);
    }

    public function destroy($id)
    {
        $industri = Industri::find($id);
        if (!$industri) {
            return response()->json(['message' => 'Industri tidak ditemukan'], 404);
        }

        $industri->delete();

        return response()->json(['message' => 'Industri berhasil dihapus']);
    }
}
