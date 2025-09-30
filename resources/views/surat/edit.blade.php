@extends('layouts.app')

@section('title', 'Edit Surat')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Surat</h3>
    </div>
    <div class="card-body">
        <p>Edit data surat. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>

        <hr>
        <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nomor_surat">Nomor Surat *</label>
                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                    id="nomor_surat" name="nomor_surat"
                    value="{{ old('nomor_surat', $surat->nomor_surat) }}" required>
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
                    <option value="{{ $kategori->id }}"
                        {{ old('kategori_id', $surat->kategori_id) == $kategori->id ? 'selected' : '' }}>
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
                    id="judul" name="judul"
                    value="{{ old('judul', $surat->judul) }}" required>
                @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="file_surat">File Surat (PDF)</label>
                <input type="file" class="form-control-file @error('file_surat') is-invalid @enderror"
                    id="file_surat" name="file_surat" accept=".pdf">
                @error('file_surat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">
                    Biarkan kosong jika tidak ingin mengganti file.
                    File saat ini: <a href="{{ asset('storage/' . $surat->file_path) }}" target="_blank">{{ basename($surat->file_path) }}</a>
                </small>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection