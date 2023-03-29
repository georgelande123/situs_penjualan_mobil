@extends('layout.main')

@section('title', 'Stock List')


@section('container')
<div class="container">
  <div class="row">
    <div class="col-5">
      <h1 class="mt-3">Stock List</h1>

      <a href="/stocks/create" class="btn btn-primary my-3">Add New Stock</a>

      @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
     @endif

      <ul class="list-group">
        @foreach ( $stocks as $stocks )
              
          
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $stocks->nama_mobil }}
             <a href="/stocks/{{ $stocks->id }}" class="badge bg-info">Detail</a>

            </li>
        @endforeach
      </ul>
      
    </div>
  </div>
</div>
@endsection
