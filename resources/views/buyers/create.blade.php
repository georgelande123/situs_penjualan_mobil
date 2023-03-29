@extends('layout.main')

@section('title', 'New Buyer Form')


@section('container')
<div class="container">
  <div class="row">
    <div class="col-5">
      <h1 class="mt-3">New Buyer Form</h1>

      <form method="post" action="/buyers">
        @csrf
          <div class="mb-3">
            <label for="nama_pembeli" class="form-label">Nama</label>
            <input type="text" id="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid
            @enderror" placeholder="Masukkan Nama" name="nama_pembeli" value="{{
            old('nama_pembeli') }}"> @error('nama_pembeli')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label for="email_pembeli" class="form-label">Email</label>
            <input type="text" id="email_pembeli" class="form-control @error('email_pembeli') is-invalid
            @enderror" placeholder="Masukkan Email" name="email_pembeli" value="{{
              old('email_pembeli') }}"> @error('email_pembeli')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label for="no_hp" class="form-label">No Handphone</label>
            <input type="text" id="no_hp" class="form-control  @error('no_hp') is-invalid
            @enderror" placeholder="Masukkan No HP" name="no_hp" value="{{
              old('no_hp') }}"> @error('no_hp')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label for="stocks_id" class="form-label">Pilih Jenis mobil</label>
             <select name="stocks_id" class="form-select @error('stocks_id') is-invalid
             @enderror">
              <option value="">--Pilih Mobil--</option>
               @foreach (App\Models\Stock::get() as $item)
               <option value="{{$item->id}}">{{ $item->nama_mobil }}</option>
               @endforeach
             </select>
             @error('stocks_id')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label for="jumlah_mobil" class="form-label">Jumlah Pembelian</label>
            <input type="text" id="jumlah_mobil" class="form-control  @error('jumlah_mobil') is-invalid
            @enderror" placeholder="Jumlah Pembelian" name="jumlah_mobil" value="{{
              old('jumlah_mobil') }}"> @error('jumlah_mobil')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <button type="submit" class="btn btn-primary">Tambah Data!</button>
      </form>

    </div>
  </div>
</div>
@endsection
