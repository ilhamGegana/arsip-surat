@extends('layouts.app')

@section('title', 'Lihat Surat')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Arsip Surat >> Lihat</h3>
    </div>
    <div class="card-body">
        <!-- Informasi Surat -->
        <div class="row mb-4">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nomor</th>
                        <td>{{ $surat->nomor_surat }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $surat->kategori->nama }}</td>
                    </tr>
                    <tr>
                        <th>Judul</th>
                        <td>{{ $surat->judul }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Unggah</th>
                        <td>{{ $surat->waktu_pengarsipan->format('Y-m-d H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <hr>

        <!-- Preview PDF -->
        <div class="row mb-4">
            <div class="col-12">
                <h5 class="text-center mb-3">
                    <strong>{{ strtoupper($surat->kategori->nama) }}</strong><br>
                    {{ $surat->nomor_surat }}
                </h5>

                <!-- Embed PDF -->
                <div class="embed-responsive embed-responsive-16by9" style="height: 600px;">
                    <iframe src="{{ asset('storage/' . $surat->file_path) }}#toolbar=0"
                        class="embed-responsive-item"
                        style="border: 1px solid #ddd;">
                        Browser Anda tidak mendukung preview PDF.
                        <a href="{{ asset('storage/' . $surat->file_path) }}" download>Download PDF</a>
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="row">
            <div class="col-12">
                <hr>
                <div class="text-center">
                    <a href="{{ route('surat.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        << Kembali
                            </a>
                            <a href="{{ asset('storage/' . $surat->file_path) }}"
                                class="btn btn-success" download
                                onclick="showDownloadSuccess('{{ $surat->judul }}')">
                                <i class="fas fa-download"></i> Unduh
                            </a>
                            <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit/Ganti File
                            </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function showDownloadSuccess(judul) {
        // Tunggu sebentar sebelum show notifikasi (biar download proses dulu)
        setTimeout(() => {
            Swal.fire({
                title: 'Download Berhasil!',
                text: 'File "' + judul + '" berhasil diunduh',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        }, 1000);
    }
</script>
@endsection