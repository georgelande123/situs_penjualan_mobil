@extends('layout.main')

@section('title', 'Buyers Detail')


@section('container')
<div class="container">
  <div class="row">
    <div class="col-5">
      <h1 class="mt-3">Buyers Detail</h1>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Nama Pembeli: {{ $buyer->nama_pembeli }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Email: {{ $buyer->email_pembeli }}</h6>
          <p class="card-text">No HP: {{ $buyer->no_hp }}</p>
          <p class="card-text">Tipe Mobil: {{ $stock->nama_mobil }}</p>
          <p class="card-text">Jumlah Pembelian: {{ $buyer->jumlah_mobil }} unit</p>


            <a href="{{ $buyer->id }}/edit" class="btn btn-primary">Edit</a>
            <form action="/buyers/{{ $buyer->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          <a href="/buyers" class="card-link">Kembali</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
