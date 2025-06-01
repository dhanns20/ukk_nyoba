<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        return response()->json(Siswa::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'       => 'required|string|max:255',
            'nis'        => 'required|string|max:255|unique:siswas,nis',
            'kelas'      => 'nullable|string|max:50',
            'gender'     => 'required|in:L,P',
            'alamat'     => 'required|string',
            'kontak'     => 'required|string|max:255',
            'email'      => 'nullable|email|max:255',
            'status_pkl' => 'nullable|boolean',
        ]);

        // Jika status_pkl tidak dikirim, set default 0
        if (!isset($validated['status_pkl'])) {
            $validated['status_pkl'] = 0;
        }

        $siswa = Siswa::create($validated);

        return response()->json($siswa, 201);
    }

    public function show($id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
        }
        return response()->json($siswa);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama'       => 'required|string|max:255',
            'nis'        => 'required|string|max:255|unique:siswas,nis,'.$id,
            'kelas'      => 'nullable|string|max:50',
            'gender'     => 'required|in:L,P',
            'alamat'     => 'required|string',
            'kontak'     => 'required|string|max:255',
            'email'      => 'nullable|email|max:255',
            'status_pkl' => 'nullable|boolean',
        ]);

        // Jika status_pkl tidak dikirim, set default 0
        if (!isset($validated['status_pkl'])) {
            $validated['status_pkl'] = 0;
        }

        $siswa->update($validated);

        return response()->json($siswa);
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
        }

        $siswa->delete();

        return response()->json(['message' => 'Siswa berhasil dihapus']);
    }
}
