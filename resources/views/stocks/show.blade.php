@extends('layout.main')

@section('title', 'Stocks Detail')


@section('container')
<div class="container">
  <div class="row">
    <div class="col-5">
      <h1 class="mt-3">Stocks Detail</h1>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $stock->nama_mobil }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Rp. {{ number_format($stock->harga_mobil, 0, ',', '.')}}</h6>
          <p class="card-text">Jumlah: {{ $stock->stock_mobil }} unit</p>


            <a href="{{ $stock->id }}/edit" class="btn btn-primary">Edit</a>
            <form action="/stocks/{{ $stock->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          <a href="/stocks" class="card-link">Kembali</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
