@extends('layouts.main')
@section('title', 'Tambah Obat')
@section('content')
    <div class="container-fluid pt-4">
        <div class="card">
            <div class="card-header">
                <h3>Update Obat</h3>
            </div>
            <div class="card-body">
                <form action="/updateObat/{{ $obat->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>ID Obat</label>
                        <input type="number" name="id" class="form-control" value="{{ $obat->id }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" name="nama" class="form-control" value="{{ $obat->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label>Bentuk Obat</label>
                        <div>
                            <input type="radio" name="bentuk" value="Tablet" {{ ($obat->bentuk == 'Tablet') ? 'checked' : '' }}> Tablet
                            <input type="radio" name="bentuk" value="Kapsul" {{ ($obat->bentuk == 'Kapsul') ? 'checked' : '' }}> Kapsul
                            <input type="radio" name="bentuk" value="Sirup" {{ ($obat->bentuk == 'Sirup') ? 'checked' : '' }}> Sirup
                            <input type="radio" name="bentuk" value="Salep" {{ ($obat->bentuk == 'Salep') ? 'checked' : '' }}> Salep
                            <input type="radio" name="bentuk" value="Injeksi" {{ ($obat->bentuk == 'Injeksi') ? 'checked' : '' }}> Injeksi
                            <input type="radio" name="bentuk" id="customOption" {{ !in_array($obat->bentuk, ['Tablet', 'Kapsul', 'Sirup', 'Salep', 'Injeksi']) ? 'checked' : '' }}>
                            <input type="text" id="customInput" name="bentuk" placeholder="Masukkan bentuk obat lain..."
                                value="{{ !in_array($obat->bentuk, ['Tablet', 'Kapsul', 'Sirup', 'Salep', 'Injeksi']) ? $obat->bentuk : '' }}"
                                {{ !in_array($obat->bentuk, ['Tablet', 'Kapsul', 'Sirup', 'Salep', 'Injeksi']) ? '' : 'disabled' }}>
                        </div>
                    </div>
                    <script>
                        document.getElementById('customOption').addEventListener('change', function() {
                            document.getElementById('customInput').disabled = !this.checked;
                            if (this.checked) {
                                document.getElementById('customInput').focus();
                            }
                        });
                    </script>
                    <div class="mb-3">
                        <label>Harga Obat</label>
                        <input type="number" min="1000" max="1000000" name="harga_obat" class="form-control" value="{{ $obat->harga_obat }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Stok Obat</label>
                        <input type="number" min="1" max="1000" name="stok_obat" class="form-control" value="{{ $obat->stok_obat }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Produsen</label>
                        <input type="text" name="produsen" class="form-control" value="{{ $obat->produsen }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Kadaluarsa</label>
                        <input type="date" name="tgl_kadaluarsa" class="form-control" value="{{ $obat->tgl_kadaluarsa }}" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
