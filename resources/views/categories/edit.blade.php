@extends('layouts.master')

@section('title')
    Update Kategori
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection

@section('content')
<div class="section-header">
    <h1>Update Kategori</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('category.index') }}">Kategori</a></div>
        <div class="breadcrumb-item">Update Kategori</div>
    </div>
</div>

<a href="{{ route('category.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                         
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent</label>
                            <select name="parent_id" class="selectpicker2" id="select-suplier" data-show-subtext="true"
                            data-live-search="true">
                                <option value="">None</option>
                                @foreach ($parent as $row)
                              
                                  <!-- TERDAPAT TERNARY OPERATOR UNTUK MENGECEK JIKA PARENT_ID SAMA DENGAN ID CATEGORY PADA LIST PARENT, MAKA OTOMATIS SELECTED -->
                                <option value="{{ $row->id }}" {{ $category->parent_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
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
        $('.selectpicker2').selectpicker();
    });
</script>
@endsection