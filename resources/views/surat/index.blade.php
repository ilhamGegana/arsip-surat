@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Arsip Surat</h3>
        <div class="card-tools">
            <a href="{{ route('surat.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Arsipkan Surat
            </a>
        </div>
    </div>
    <div class="card-body">
        <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
            <span class="text-danger font-weight-bold">Klik 'Lihat' pada kolom aksi untuk menampilkan atau ingin mengedit data surat.</span>
        </p>

        <hr>

        <!-- Custom Search Form -->
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" id="customSearch" class="form-control" placeholder="Cari surat...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="btnSearch">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        <button class="btn btn-secondary" type="button" id="btnReset">
                            <i class="fas fa-times"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="suratTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Waktu Pengarsipan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surats as $surat)
                    <tr>
                        <td>{{ $surat->nomor_surat }}</td>
                        <td>{{ $surat->kategori->nama }}</td>
                        <td>{{ $surat->judul }}</td>
                        <td>{{ $surat->waktu_pengarsipan->format('Y-m-d H:i') }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $surat->id }}')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                            <a href="{{ asset('storage/' . $surat->file_path) }}"
                                class="btn btn-success btn-sm"
                                download
                                onclick="showDownloadSuccess('{{ $surat->judul }}')">
                                <i class="fas fa-download"></i> Unduh
                            </a>
                            <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Lihat >>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Inisialisasi DataTables untuk Surat
        var table = $('#suratTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            },
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "Semua"]
            ],
            "order": [
                [3, 'desc']
            ], // Sort by waktu pengarsipan descending
            "searching": true, // Nonaktifkan search bawaan DataTables
            "dom": "lrtip" // Hapus f (filter bawaan), tapi biarkan l,r,t,i,p (pagination tetap ada)
        });

        // Custom Search dengan tombol
        $('#btnSearch').click(function() {
            var searchValue = $('#customSearch').val();
            table.search(searchValue).draw();
        });

        // Reset Search
        $('#btnReset').click(function() {
            $('#customSearch').val('');
            table.search('').draw();
        });

        // Enter key untuk search
        $('#customSearch').keypress(function(e) {
            if (e.which == 13) {
                $('#btnSearch').click();
            }
        });
    });

    function confirmDelete(suratId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form delete
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/surat/' + suratId;
                form.innerHTML = `@csrf @method('DELETE')`;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    function showDownloadSuccess(judul) {
        setTimeout(() => {
            Swal.fire({
                title: 'Berhasil!',
                text: 'File ' + judul + ' berhasil diunduh',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        }, 1000);
    }
</script>
@endsection