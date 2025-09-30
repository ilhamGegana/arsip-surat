@extends('layouts.app')

@section('title', 'Arsipkan Surat Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Arsipkan Surat Baru</h3>
    </div>
    <div class="card-body">
        <p>Unggah surat yang telah terbit pada form ini.<br>
        <span class="text-danger font-weight-bold">Gunakan Format File PDF</span><br>
            Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>

        <hr>
        <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nomor_surat">Nomor Surat *</label>
                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                    id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}" required>
                @error('nomor_surat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kategori_id">Kategori *</label>
                <select class="form-control @error('kategori_id') is-invalid @enderror"
                    id="kategori_id" name="kategori_id" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                    @endforeach
                </select>
                @error('kategori_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="judul">Judul *</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                    id="judul" name="judul" value="{{ old('judul') }}" required>
                @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="file_surat">File Surat (PDF) *</label>
                <input type="file" class="form-control-file @error('file_surat') is-invalid @enderror"
                    id="file_surat" name="file_surat" accept=".pdf" required>
                @error('file_surat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Hanya file PDF yang diperbolehkan</small>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('surat.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection