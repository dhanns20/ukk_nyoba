<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pkl;

class PklController extends Controller
{
    public function index()
    {
        return response()->json(Pkl::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id'    => 'required|exists:siswas,id',
            'industri_id' => 'required|exists:industris,id',
            'guru_id'     => 'required|exists:gurus,id',
            'mulai'       => 'required|date',
            'selesai'     => 'required|date|after_or_equal:mulai',
        ]);

        $pkl = Pkl::create($validated);

        return response()->json($pkl, 201);
    }

    public function show($id)
    {
        $pkl = Pkl::find($id);
        if (!$pkl) {
            return response()->json(['message' => 'PKL tidak ditemukan'], 404);
        }
        return response()->json($pkl);
    }

    public function update(Request $request, $id)
    {
        $pkl = Pkl::find($id);
        if (!$pkl) {
            return response()->json(['message' => 'PKL tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'siswa_id'    => 'required|exists:siswas,id',
            'industri_id' => 'required|exists:industris,id',
            'guru_id'     => 'required|exists:gurus,id',
            'mulai'       => 'required|date',
            'selesai'     => 'required|date|after_or_equal:mulai',
        ]);

        $pkl->update($validated);

        return response()->json($pkl);
    }

    public function destroy($id)
    {
        $pkl = Pkl::find($id);
        if (!$pkl) {
            return response()->json(['message' => 'PKL tidak ditemukan'], 404);
        }

        $pkl->delete();

        return response()->json(['message' => 'PKL berhasil dihapus']);
    }
}
