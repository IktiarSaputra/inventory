@extends('layouts.master')

@section('title')
Produk Keluar
@endsection

@section('css')
<link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection

@section('content')
<div class="section-header">
    <h1>Produk Keluar</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Produk Keluar</div>
    </div>
</div>

<a href="{{ route('productOut.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Tambah Produk Keluar</a>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Nama</th>
                                    <th>Harga Beli</th>
                                    <th>Qty</th>
                                    <th>SubTotal</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productout as $item)
                                <tr>
                                    <td>{{ $item->order->invoice }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>Rp. {{ number_format($item->price) }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>Rp. {{ number_format($item->price * $item->qty) }}</td>
                                    <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                                    <td>
                                        <a href="/admin/productOut/delete/{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form class="modal-part" id="modal-login-part" action="{{ route('productOut.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label>Produk</label><br>
        <select class="selectpicker" id="select-country" name="product_id" data-show-subtext="true"
            data-live-search="true" required>
            <option value="">Pilih Produk</option>
            @foreach ($product as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <p class="text-danger">{{ $errors->first('product_id') }}</p>
    </div>

    <div class="form-group">
        <label>Supplier</label><br>
        <select class="selectpicker2" id="select-suplier" name="suplier_id" data-show-subtext="true"
            data-live-search="true" required>
            <option value="">Pilih Supplier</option>
            @foreach ($suplier as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <p class="text-danger">{{ $errors->first('suplier_id') }}</p>
    </div>

    <div class="form-group">
        <label for="price">Harga Beli</label>
        <input type="number" name="price" class="form-control" placeholder="Harga Beli" required>
        <p class="text-danger">{{ $errors->first('price') }}</p>
    </div>

    <div class="form-group">
        <label for="stok">Qty</label>
        <input type="number" name="stok" value="1" class="form-control" placeholder="Jumlah Produk">
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Tambah</button>
    </div>
</form>
@endsection

@section('js')
<script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables-demo.js') }}"></script>
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });

    $(function () {
        $('.selectpicker2').selectpicker();
    });
</script>

@if (session('insert'))
<script>
    swal("Produk Keluar Berhasil Di Tambah", {
        title: "Sukses",
        icon: "success",
    });
</script>
@endif

@if (session('update'))
<script>
    swal("Produk Keluar Berhasil Di Update", {
        title: "Sukses",
        icon: "success",
    });
</script>
@endif

@if (session('delete'))
<script>
    swal("Produk Keluar Berhasil Di Hapus", {
        title: "Success",
        icon: "success",
    });
</script>
@endif

<script>
    $('.delete').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: "Apa Kamu Yakin?",
            text: "Produk Keluar Ini Akan Di Hapus Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal("Produk Keluar Tetap Tersimpan!");
            }
        });
    });
</script>

@if (session('error'))
<script>
    swal("Produk Gagal Di Hapus", {
        title: "Produk Tidak Bisa Di Hapus",
        text: "Produk Ini Sudah Memiliki Produk Masuk",
        icon: "error",
    });
</script>
@endif
@endsection