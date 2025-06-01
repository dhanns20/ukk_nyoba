<?php

namespace App\Http\Controllers;
use App\Models\Guru;


use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function index()
    {
        // Menampilkan semua data guru dari tabel Guru
        $guru = Guru::get();
        return response()->json($guru, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $guru = Guru::create($validated);

        return response()->json($guru, 201);
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['message' => 'Guru tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama'   => 'sometimes|string|max:255',
            'nip'    => 'sometimes|string|max:255',
            'gender' => 'sometimes|in:L,P',
            'alamat' => 'sometimes|string',
            'kontak' => 'sometimes|string|max:255',
            'email'  => 'sometimes|email|max:255',
        ]);

        $guru->update($validated);

        return response()->json([
            'message' => 'Guru berhasil diperbarui',
            'data'    => $guru
        ]);
    }

    public function destroy($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['message' => 'Guru tidak ditemukan'], 404);
        }

        $guru->delete();

        return response()->json(['message' => 'Guru berhasil dihapus']);
    }
}
