@extends('layouts.master')

@section('title')
    Update Produk
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection

@section('content')
<div class="section-header">
    <h1>Update Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('product.index') }}">Produk</a></div>
        <div class="breadcrumb-item">Update Produk</div>
    </div>
</div>

<a href="{{ route('product.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                         
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" value="{{ $product->kode }}" class="form-control" placeholder="Name Product" readonly>
                            <p class="text-danger">{{ $errors->first('kode') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Nama Produk" required>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                    
                        <div class="form-group">
                            <label>Kategori</label><br>
                            <select class="selectpicker" id="select-country" name="category_id" data-show-subtext="true"
                                data-live-search="true" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $c)
                                <option data-tokens="{{ $c->name }}" value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected':'' }}>{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="price">Harga Jual</label>
                            <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="Harga Produk" required>
                            <p class="text-danger">{{ $errors->first('price') }}</p>
                        </div>
                
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" value="{{ $product->qty }}" class="form-control" placeholder="Stok Produk" readonly>
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
</script>
@endsection