@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">About</h3>
    </div>
    <div class="card-body">
        <h4>Aplikasi ini dibuat oleh:</h4>
        
        <div class="row">
            <div class="col-md-4 text-center mb-3">
                <!-- Foto Pembuat -->
                <div class="text-center">
                    <img src="{{ asset('images/foto-pembuat.jpg') }}" 
                         alt="Foto Ilham Gegana Raya Firmansyah" 
                         class="img-fluid rounded-circle" 
                         style="max-width: 200px; border: 3px solid #007bff;">
                    <div class="mt-2">
                        <strong>Ilham Gegana Raya Firmansyah</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama</th>
                        <td>Ilham Gegana Raya Firmansyah</td>
                    </tr>
                    <tr>
                        <th>Prodi</th>
                        <td>D3-MI PSDKU PAMEKASAN</td>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <td>2231750001</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>30 September 2025</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection