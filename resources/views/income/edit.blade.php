@extends('layouts.master')

@section('title')
    Update Pemasukan
@endsection

@section('css')
    
@endsection

@section('content')
<div class="section-header">
    <h1>Update Pemasukan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('income.index') }}">Pemasukan</a></div>
        <div class="breadcrumb-item">Update Pemasukan</div>
    </div>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('income.update', $income->id) }}" method="post">
                        @csrf
                        @method('PUT')
                         
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <input type="text" name="description" class="form-control" value="{{ $income->description }}" placeholder="Deskripsi Pemasukan" required>
                            <p class="text-danger">{{ $errors->first('description') }}</p>
                        </div>
                    
                        <div class="form-group">
                            <label for="price">Biaya</label>
                            <input type="number" name="price" class="form-control" value="{{ $income->price }}" placeholder="Biaya Pemasukan" required>
                            <p class="text-danger">{{ $errors->first('price') }}</p>
                        </div>
                    
                        <div class="form-group">
                            <label for="stok">Jumlah</label>
                            <input type="number" name="qty" value="1" class="form-control" value="{{ $income->jumlah }}" placeholder="Jumlah" required>
                            <p class="text-danger">{{ $errors->first('qty') }}</p>
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
    
@endsection