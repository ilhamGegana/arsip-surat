@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Kategori</h3>
    </div>
    <div class="card-body">
        <p>Edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>

        <hr>

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama Kategori *</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                    id="nama" name="nama" value="{{ old('nama', $kategori->nama) }}" required>
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="judul">Keterangan *</label>
                <textarea class="form-control @error('judul') is-invalid @enderror"
                    id="judul" name="judul" rows="3" required>{{ old('judul', $kategori->judul) }}</textarea>
                @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
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