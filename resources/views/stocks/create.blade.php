@extends('layout.main')

@section('title', 'New Stock Form')


@section('container')
<div class="container">
  <div class="row">
    <div class="col-5">
      <h1 class="mt-3">New Stock Form</h1>

      <form method="post" action="/stocks">
        @csrf
          <div class="mb-3">
            <label for="nama_mobil" class="form-label">Nama</label>
            <input type="text" id="nama_mobil" class="form-control @error('nama_mobil') is-invalid
            @enderror" placeholder="Masukkan Nama" name="nama_mobil" value="{{ 
            old('nama_mobil') }}"> @error('nama_mobil')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label for="harga_mobil" class="form-label">Harga</label>
            <input type="text" id="harga_mobil" class="form-control @error('harga_mobil') is-invalid
            @enderror" placeholder="Masukkan Harga" name="harga_mobil" value="{{ 
              old('harga_mobil') }}"> @error('harga_mobil')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label for="stock_mobil" class="form-label">Jumlah</label>
            <input type="text" id="stock_mobil" class="form-control  @error('stock_mobil') is-invalid
            @enderror" placeholder="Masukkan Jumlah" name="stock_mobil" value="{{ 
              old('stock_mobil') }}"> @error('stock_mobil')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <button type="submit" class="btn btn-primary">Tambah Data!</button>
      </form>

    </div>
  </div>
</div>
@endsection
