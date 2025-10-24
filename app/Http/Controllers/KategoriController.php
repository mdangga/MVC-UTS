<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
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

        $kategoris = Kategori::when($search, function($q, $search){
            $q->where('nama_kategori', 'like', "%{$search}%");
        })->paginate($perPage)->withQueryString();

        return view('pages.kategoris.kategori_list', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategoris.form_kategori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('message', 'Validasi gagal.');
        }

        $data = $validator->validated();

        Kategori::create($data);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
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
        $kategori = Kategori::findOrFail($id);
        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan.');
        }

        return view('pages.kategoris.form_kategori', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori,'.$kategori->id_kategori.',id_kategori',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('message', 'Validasi gagal.');
        }

        $data = $validator->validated();

        $kategori->update($data);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        
        if (!$kategori) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}