@extends('layouts.master')

@section('title')
    Update Supplier
@endsection

@section('css')
    
@endsection

@section('content')
<div class="section-header">
    <h1>Update Supplier</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('suplier.index') }}">Supplier</a></div>
        <div class="breadcrumb-item">Update Supplier</div>
    </div>
</div>

<a href="{{ route('suplier.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('suplier.update', $suplier->id) }}" method="post">
                        @csrf
                        @method('PUT')
                         
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $suplier->name }}" required>
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
    
@endsection