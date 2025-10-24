<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('per_page', 5);
        $allowedPerPage = [5, 10, 25, 50, 100];

        if (!in_array($perPage, $allowedPerPage)) {
            $perPage = 5;
        }

        $pemasoks = Pemasok::when($search, function ($q, $search) {
            $q->where('nama_pemasok', 'like', "%{$search}%")
                ->orWhere('kontak', 'like', "%{$search}%");
        })->paginate($perPage)->withQueryString();

        return view('pages.pemasoks.pemasok_list', compact('pemasoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pemasoks.form_pemasok');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pemasok' => 'required|string|max:255|unique:pemasok,nama_pemasok',
            'alamat' => 'required|string|max:255|',
            'kontak' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(?:\+62|62|0)(?:8[1-9][0-9]{6,10}|[1-9][0-9]{6,9})$/'
            ],
        ], [
            'kontak.regex' => 'Format nomor kontak tidak valid. Harap gunakan format yang benar.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('message', 'Validasi gagal.');
        }

        $data = $validator->validated();

        Pemasok::create($data);

        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemasok = Pemasok::findOrFail($id);
        if (!$pemasok) {
            return redirect()->route('pemasok.index')->with('error', 'Pemasok tidak ditemukan.');
        }

        return view('pages.pemasoks.form_pemasok', compact('pemasok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemasok = Pemasok::find($id);

        if (!$pemasok) {
            return redirect()->back()->with('error', 'Pemasok tidak ditemukan');
        }

        $validator = Validator::make($request->all(), [
            'nama_pemasok' => 'required|string|max:255|unique:pemasok,nama_pemasok,' . $pemasok->id_pemasok . ',id_pemasok',
            'alamat' => 'required|string|max:255',
            'kontak' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(?:\+62|62|0)(?:8[1-9][0-9]{6,10}|[1-9][0-9]{6,9})$/'
            ],
        ], [
            'kontak.regex' => 'Format nomor kontak tidak valid. Harap gunakan format yang benar.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('message', 'Validasi gagal.');
        }

        $data = $validator->validated();

        $pemasok->update($data);

        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemasok = Pemasok::find($id);

        if (!$pemasok) {
            return redirect()->back()->with('error', 'Pemasok tidak ditemukan');
        }

        $pemasok->delete();

        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil dihapus!');
    }
}
