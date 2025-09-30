@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kategori Surat</h3>
        <div class="card-tools">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Kategori Baru
            </a>
        </div>
    </div>
    <div class="card-body">
        <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>
            Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.
        </p>

        <hr>

        <!-- Custom Search Form -->
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" id="customSearch" class="form-control" placeholder="Cari kategori...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="btnSearch">
                            <i class="fas fa-search"></i> Cari!
                        </button>
                        <button class="btn btn-secondary" type="button" id="btnReset">
                            <i class="fas fa-times"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="kategoriTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->judul }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $kategori->id }}')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
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
        // Inisialisasi DataTables
        var table = $('#kategoriTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            },
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "Semua"]
            ],
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


    function confirmDelete(kategoriId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Kategori yang dihapus tidak dapat dikembalikan!",
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
                form.action = '/kategori/' + kategoriId;
                form.innerHTML = `@csrf @method('DELETE')`;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection