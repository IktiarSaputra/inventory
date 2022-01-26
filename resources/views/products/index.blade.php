@extends('layouts.master')

@section('title')
List Produk 
@endsection

@section('css')
<link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection

@section('content')
<div class="section-header">
    <h1>List Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Produk</div>
    </div>
</div>

<button class="btn btn-primary mb-4" id="modal-7"><i class="fas fa-plus"></i> Tambah Product</button>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Name</th>
                                    <th>Kategori</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Created At</th>
                                    <th>QrCode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>Rp. {{ number_format($item->price) }}</td>
                                    <td>
                                        @if ($item->qty > 0)
                                            {{ $item->qty }}
                                        @else
                                            <span class="badge badge-danger">Kosong</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        {{-- <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($item->kode, 'C39',2,50)}}" alt="barcode" /> --}}
                                        {!! DNS1D::getBarcodeHTML($item->kode, 'CODABAR') !!}
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('delete.product', $item->id) }}"
                                            class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>
                                        <a href="data:image/png;base64,{{DNS1D::getBarcodePNG($item->kode, 'C39',2,50)}}" download="{{ $item->name }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-download"></i></a>
                                        
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

<form class="modal-part" id="modal-login-part" action="{{ route('product.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="kode">Kode</label>
        <input type="text" name="kode" value="{{ $kode }}" class="form-control" placeholder="Name Product" readonly>
        <p class="text-danger">{{ $errors->first('kode') }}</p>
    </div>
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" placeholder="Nama Produk" required>
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>

    <div class="form-group">
        <label>Kategori</label><br>
        <select class="selectpicker" id="select-country" name="category_id" data-show-subtext="true"
            data-live-search="true" required>
            <option value="">Pilih Kategori</option>
            @foreach ($category as $c)
            <option data-tokens="{{ $c->name }}" value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="price">Harga Jual</label>
        <input type="number" name="price" class="form-control" placeholder="Harga Produk" required>
        <p class="text-danger">{{ $errors->first('price') }}</p>
    </div>

    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" name="qty" value="0" class="form-control" readonly placeholder="Stok Produk">
        <p class="text-danger">{{ $errors->first('qty') }}</p>
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
</script>

@if (session('insert'))
<script>
    swal("Produk Berhasil Di Tambah",{
            title: "Sukses",
            icon: "success",
        });
</script>
@endif

@if (session('update'))
<script>
    swal("Produk Berhasil Di Update",{
            title: "Sukses",
            icon: "success",
        });
</script>
@endif

@if (session('delete'))
<script>
    swal("Produk Berhasil Di Hapus",{
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
        text: "Produk Ini Akan Di Hapus Permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
              window.location.href = url;
          }
          else {
            swal("Produk Tetap Tersimpan!");
        }
      });
  });
  </script>

@if (session('error'))
<script>
    swal("Produk Gagal Di Hapus",{
            title: "Produk Tidak Bisa Di Hapus",
            text: "Produk Ini Sudah Memiliki Produk Masuk",
            icon: "error",
        });
</script>
@endif
@endsection