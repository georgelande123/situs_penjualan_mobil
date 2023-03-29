@extends('layout.main')

@section('title', 'Edit Buyer Form')


@section('container')
<div class="container">
  <div class="row">
    <div class="col-5">
      <h1 class="mt-3">Edit Buyer Form</h1>

      <form method="post" action="/buyers/{{ $buyer->id }}">
        @method('patch')
        @csrf
          <div class="mb-3">
            <label for="nama_pembeli" class="form-label">Nama</label>
            <input type="text" id="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid
            @enderror" placeholder="Masukkan Nama" name="nama_pembeli" value="{{
            $buyer->nama_pembeli }}"> @error('nama_pembeli')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label for="email_pembeli" class="form-label">Email</label>
            <input type="text" id="email_pembeli" class="form-control @error('email_pembeli') is-invalid
            @enderror" placeholder="Masukkan Email" name="email_pembeli" value="{{
              $buyer->email_pembeli }}"> @error('email_pembeli')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label for="no_hp" class="form-label">No Handphone</label>
            <input type="text" id="no_hp" class="form-control  @error('no_hp') is-invalid
            @enderror" placeholder="Masukkan No HP" name="no_hp" value="{{
              $buyer->no_hp }}"> @error('no_hp')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label for="stocks_id" class="form-label">Tipe Mobil</label>
             <select name="stocks_id" class="form-select">
              {{-- <option>--Pilih Mobil--</option> --}}
               @foreach (App\Models\Stock::get() as $item)
               <option value="{{$item->id}}"
                @if ($item->id === $buyer->stocks_id)
                 selected="selected"
                @endif
                >{{ $item->nama_mobil }}</option>
               @endforeach
             </select>
          </div>
          <div class="mb-3">
            <label for="jumlah_mobil" class="form-label">Jumlah Mobil</label>
            <input type="text" id="jumlah_mobil" class="form-control  @error('jumlah_mobil') is-invalid
            @enderror" placeholder="Masukkan Jenis Mobil" name="jumlah_mobil" value="{{
              $buyer->jumlah_mobil }}"> @error('jumlah_mobil')
            <div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <button type="submit" class="btn btn-primary">Ubah Data!</button>
      </form>

    </div>
  </div>
</div>
@endsection
