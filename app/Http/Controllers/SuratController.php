<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function index()
    {
        $surats = Surat::with('kategori')->latest()->get();
        return view('surat.index', compact('surats'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $surats = Surat::with('kategori')
            ->where('judul', 'like', "%{$search}%")
            ->orWhere('nomor_surat', 'like', "%{$search}%")
            ->latest()
            ->get();

        return view('surat.index', compact('surats'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('surat.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'file_surat' => 'required|file|mimes:pdf|max:2048'
        ]);

        // Upload file PDF
        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('surat-pdf', $fileName, 'public');
        }

        // Simpan data surat
        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'file_path' => $filePath,
            'waktu_pengarsipan' => now(),
        ]);

        return redirect()->route('surat.index')
            ->with('success', 'Data surat berhasil disimpan!');
    }

    public function show($id)
    {
        $surat = Surat::with('kategori')->findOrFail($id);
        return view('surat.show', compact('surat'));
    }
    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $kategoris = Kategori::all();
        return view('surat.edit', compact('surat', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);

        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        $data = [
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
        ];

        // Jika ada file baru, upload dan replace yang lama
        if ($request->hasFile('file_surat')) {
            // Hapus file lama
            Storage::disk('public')->delete($surat->file_path);

            // Upload file baru
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('surat-pdf', $fileName, 'public');

            $data['file_path'] = $filePath;
        }

        $surat->update($data);

        return redirect()->route('surat.show', $surat->id)
            ->with('success', 'Data surat berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);

        // Hapus file PDF dari storage
        Storage::disk('public')->delete($surat->file_path);

        // Hapus data dari database
        $surat->delete();

        return redirect()->route('surat.index')
            ->with('success', 'Data surat berhasil dihapus!');
    }
}
