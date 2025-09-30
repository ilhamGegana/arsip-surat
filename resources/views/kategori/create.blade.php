@extends('layouts.app')

@section('title', 'Tambah Kategori Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kategori Surat >> Tambah</h3>
    </div>
    <div class="card-body">
        <p>Tambahkan data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>

        <hr>

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Kategori *</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                    id="nama" name="nama" value="{{ old('nama') }}"
                    placeholder="Contoh: Pengumuman, Undangan, dll." required>
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="judul">Keterangan *</label>
                <textarea class="form-control @error('judul') is-invalid @enderror"
                    id="judul" name="judul" rows="3"
                    placeholder="Deskripsi tentang kategori ini..." required>{{ old('judul') }}</textarea>
                @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">
                    Contoh: "Kategori ini digunakan untuk surat yang sifatnya berupa pengumuman atau menginformasikan suatu perihal."
                </small>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    << Kembali
                        </a>
            </div>
        </form>
    </div>
</div>
@endsection