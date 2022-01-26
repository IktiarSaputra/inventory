@extends('layouts.master')

@section('title')
    Transaksi Sukses
@endsection

@section('css')
    
@endsection

@section('content')
<div class="section-header">
    <h1>Transaksi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('productOut.index') }}">Transaksi</a></div>
        <div class="breadcrumb-item">Transaksi Sukses</div>
    </div>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="hero bg-primary text-white">
              <div class="hero-inner">
                <div class="row">
                    <div class="col-md-9">
                        <h2>Transaksi Sukses !</h2>
                        <th>Uang Kembalian : Rp. {{ $kembalian }}</th>
                        <p class="lead">Silahkan Cetak Struk Belanja Sebagai Bukti Pembayaran.</p>
                    </div>
                    <div class="col-md-3 text-center mt-3">
                        <a target="_BLANK" href="{{ route('productOut.export', $invoice) }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-print"></i>Cetak Struk Belanja</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection