@extends('layout.main')

@section('title', 'Buyers List')


@section('container')
<div class="container">
  <div class="row">
    <div class="col-5">
      <h1 class="mt-3">Buyers List</h1>

      <a href="/buyers/create" class="btn btn-primary my-3">Add New Buyer</a>

      @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
     @endif

      <ul class="list-group">
        @foreach ( $buyers as $buyer )
              
          
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $buyer->nama_pembeli }}
             <a href="/buyers/{{ $buyer->id }}" class="badge bg-info">Detail</a>

            </li>
        @endforeach
      </ul>
      
    </div>
  </div>
</div>
@endsection
