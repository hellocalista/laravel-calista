<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan; 

class PelangganController extends Controller
{
    public function index()
    {
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }

    public function create()
    {
        return view('admin.pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'birthday'   => 'nullable|date',
            'gender'     => 'nullable|string',
            'email'      => 'required|email|unique:pelanggans,email',
            'phone'      => 'nullable|string|max:20',
        ]);

        try {
            Pelanggan::create($request->all());
            
            return redirect()->route('pelanggan.index')
                             ->with('success', 'Penambahan Data Berhasil!');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                             ->withInput();
        }
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $data['dataPelanggan'] = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'birthday'   => 'nullable|date',
            'gender'     => 'nullable|string',
            'email'      => 'required|email|unique:pelanggans,email,' . $id,
            'phone'      => 'nullable|string|max:20',
        ]);

        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->update($request->all());

            return redirect()->route('pelanggan.index')
                             ->with('success', 'Perubahan Data Berhasil!');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                             ->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();

            return redirect()->route('pelanggan.index')
                             ->with('success', 'Data Berhasil Dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('pelanggan.index')
                             ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}