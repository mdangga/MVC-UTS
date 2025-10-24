<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
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

        $barangs = Barang::with('pemasok', 'kategori')->when($search, function($q, $search){
            $q->where('nama_barang', 'like', "%{$search}%")
            ->orWhereHas('kategori', function($q2) use ($search){
                $q2->where('nama_kategori', 'like', "%{$search}%");
            })->orWhereHas('pemasok', function($q3) use ($search){
                $q3->where('nama_pemasok', 'like', "%{$search}%");
            });
        })->paginate($perPage)->withQueryString();

        return view('pages.barangs.barang_list', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $pemasoks = Pemasok::all();

        return view('pages.barangs.form_barang', compact('kategoris', 'pemasoks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string|max:255|unique:barang,nama_barang',
            'stok' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_pemasok' => 'nullable|exists:pemasok,id_pemasok'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('message', 'Validasi gagal.');
        }

        $data = $validator->validated();

        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::with('kategori', 'pemasok')->findOrFail($id);
        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan.');
        }
        return view('pages.barangs.barang_detail', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan.');
        }
        $kategoris = Kategori::all();
        $pemasoks = Pemasok::all();

        return view('pages.barangs.form_barang', compact('barang', 'kategoris', 'pemasoks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string|max:255|unique:barang,nama_barang,'.$barang->id_barang.',id_barang',
            'stok' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_pemasok' => 'nullable|exists:pemasok,id_pemasok'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('message', 'Validasi gagal.');
        }

        $data = $validator->validated();

        $barang->update($data);

        return redirect()->route('barang.show')->with('success', 'Barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
