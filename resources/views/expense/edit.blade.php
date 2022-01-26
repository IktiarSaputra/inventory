@extends('layouts.master')

@section('title')
    Update Pengeluaran
@endsection

@section('css')
    
@endsection

@section('content')
<div class="section-header">
    <h1>Update Pengeluaran</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('expense.index') }}">Pengeluaran</a></div>
        <div class="breadcrumb-item">Update Pengeluaran</div>
    </div>
</div>

<a href="{{ route('expense.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('expense.update', $expense->id) }}" method="post">
                        @csrf
                        @method('PUT')
                         
                        <div class="form-group">
                            <label for="name">Deskripsi</label>
                            <input type="text" name="description" class="form-control" value="{{ $expense->description }}" required>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="price">Biaya</label>
                            <input type="number" name="price" class="form-control" value="{{ $expense->price }}" placeholder="Biaya Pengeluaran" required>
                            <p class="text-danger">{{ $errors->first('price') }}</p>
                        </div>
                    
                        <div class="form-group">
                            <label for="stok">Jumlah</label>
                            <input type="number" name="qty" value="1" class="form-control" value="{{ $expense->qty }}" placeholder="Jumlah" required>
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