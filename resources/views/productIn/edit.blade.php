@extends('layouts.master')

@section('title')
Update Produk Masuk
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection

@section('content')
<div class="section-header">
    <h1>Update Produk Masuk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('productIn.index') }}">Produk Masuk</a></div>
        <div class="breadcrumb-item">Update Produk Masuk</div>
    </div>
</div>

<a href="{{ route('productIn.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('productIn.update', $productin->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Produk</label><br>
                            <select required class="selectpicker" id="select-country" name="product_id"
                                data-show-subtext="true" data-live-search="true">
                                <option>Pilih Produk</option>
                                @foreach ($product as $item)
                                <option data-tokens="{{ $item->name }}" value="{{ $item->id }}"
                                    {{ $productin->product_id == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Supplier</label><br>
                            <select required class="selectpicker2" id="select-suplier" name="suplier_id"
                                data-show-subtext="true" data-live-search="true">
                                <option>Pilih supplier</option>
                                @foreach ($suplier as $s)
                                <option data-tokens="{{ $s->name }}" value="{{ $s->id }}"
                                    {{ $productin->suplier_id == $s->id ? 'selected':'' }}>{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga Beli</label>
                            <input type="number" name="price" value="{{ $productin->price }}" class="form-control" placeholder="Harga Beli"
                                required>
                            <p class="text-danger">{{ $errors->first('price') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="stok">Qty</label>
                            <input type="number" name="stok" value="{{ $productin->qty }}" class="form-control" placeholder="Jumlah Produk">
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });

    $(function () {
        $('.selectpicker2').selectpicker();
    });
</script>
@endsection