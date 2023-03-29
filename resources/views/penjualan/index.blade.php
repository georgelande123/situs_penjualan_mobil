@extends('layout.main')

@section('title', 'Report Penjualan')


@section('container')
<div class="container">
  <div class="row">
    <div class="col-5">
      <h1 class="mt-3">Report Penjualan</h1>
      <div class="container">
        <div class="row">
        <div class="col mt-3">Data Hari ini</div>
          <div class="w-100"></div>
          <div class="col mt-3">Mobil yang paling banyak dijual</div>
          @if ($mobil)
          <div class="col mt-3">{{ $mobil->nama_mobil }}</div>
          @else
          <div class="col mt-3">Belum ada mobil terjual.</div>
          @endif
          <div class="w-100"></div>
          <div class="col mt-3">Penjualan Hari ini</div>
          <div class="col mt-3">{{ $hari_ini }} ({{ number_format($percent, 2) }}%)</div>
          <div class="w-100"></div>
          <div class="col mt-3">Total Penjualan hari ini</div>
          <div class="col mt-3">Rp {{ number_format($harga, 2, ',', '.')}} ({{ number_format($percent_harga, 2) }}%)</div>
          <div class="w-100 mt-5"></div>
          <div class="col mt-3">Data 7 hari terakhir</div>
          <div class="w-100"></div>
          <div class="col mt-3">Mobil yang paling banyak dijual</div>
          @if ($mobil_7hari)
          <div class="col mt-3">{{ $mobil_7hari->nama_mobil }}</div>
          @else
          <div class="col mt-3">Belum ada mobil terjual.</div>
          @endif
          <div class="w-100"></div>
          <div class="col mt-3">Penjualan 7 Hari</div>
          <div class="col mt-3">{{ $tujuh_hari }}</div>
          <div class="w-100"></div>
          <div class="col mt-3">Total Penjualan 7 hari</div>
          <div class="col mt-3">Rp {{ number_format($harga_7hari, 2) }}</div>
        </div>
@endsection
