@extends('layouts.master')

@section('title')
List Pemasukan
@endsection

@section('css')
<link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="section-header">
    <h1>List Pemasukan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Pemasukan</div>
    </div>
</div>

<div class="row">
    <div class="col-md-7">
        <button class="btn btn-primary mb-4" id="modal-11"><i class="fas fa-plus"></i> Tambah Pemasukan</button>
    </div>
    <div class="col-md-5">
        <form action="{{ route('income.index') }}" method="get">
            <div class="input-group pl-0 mb-3  ml-auto">
                <input type="text" id="created_at" name="date" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-filter"></i></button>
                </div>
                <a target="_blank" class="btn btn-primary ml-2" id="exportpdf">Export PDF</a>
            </div>
        </form>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Deskripsi</th>
                                    <th>Qty</th>
                                    <th>Biaya</th>
                                    <th>Subtotal</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($income as $item)
                                <tr>
                                    @if ($item->description == "Menjual")
                                        <td>{{ $item->description }} {{ $item->product->name }}
                                            </td>
                                        <td>{{ number_format($item->productout->qty) }}</td>
                                        <td>Rp. {{ number_format($item->price) }}</td>
                                        <td>Rp. {{ number_format($item->subtotal) }}</td>
                                        <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                                        <td>
                                            <a href="{{ route('delete.income', $item->id) }}"
                                                class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                    @else
                                        <td>{{ $item->description }}</td>
                                        <td>{{ number_format($item->qty) }}</td>
                                        <td>Rp. {{ number_format($item->price) }}</td>
                                        <td>Rp. {{ number_format($item->subtotal) }}</td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('income.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('delete.income', $item->id) }}"
                                                class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                    @endif
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

<form class="modal-part" id="modal" action="{{ route('income.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="description">Deskripsi</label>
        <input type="text" name="description" class="form-control" placeholder="Deskripsi Pemasukan" required>
        <p class="text-danger">{{ $errors->first('description') }}</p>
    </div>

    <div class="form-group">
        <label for="price">Biaya</label>
        <input type="number" name="price" class="form-control" placeholder="Biaya Pemasukan" required>
        <p class="text-danger">{{ $errors->first('price') }}</p>
    </div>

    <div class="form-group">
        <label for="stok">Jumlah</label>
        <input type="number" name="qty" value="1" class="form-control" placeholder="Jumlah" required>
        <p class="text-danger">{{ $errors->first('qty') }}</p>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Tambah</button>
    </div>
</form>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}" />
<script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables-demo.js') }}"></script>
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
<script>
    //KETIKA PERTAMA KALI DI-LOAD MAKA TANGGAL NYA DI-SET TANGGAL SAA PERTAMA DAN TERAKHIR DARI BULAN SAAT INI
    $(document).ready(function () {
        let start = moment().startOf('month')
        let end = moment().endOf('month')

        //KEMUDIAN TOMBOL EXPORT PDF DI-SET URLNYA BERDASARKAN TGL TERSEBUT
        $('#exportpdf').attr('href', '/admin/income/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format(
            'YYYY-MM-DD'))

        //INISIASI DATERANGEPICKER
        $('#created_at').daterangepicker({
            startDate: start,
            endDate: end
        }, function (first, last) {
            //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
            $('#exportpdf').attr('href', '/admin/income/pdf/' + first.format('YYYY-MM-DD') + '+' + last
                .format('YYYY-MM-DD'))
        })
    })
</script>

@if (session('insert'))
<script>
    swal("Pemasukan Berhasil Di Tambah", {
        title: "Sukses",
        icon: "success",
    });
</script>
@endif

@if (session('update'))
<script>
    swal("Pemasukan Berhasil Di Update", {
        title: "Sukses",
        icon: "success",
    });
</script>
@endif

@if (session('delete'))
<script>
    swal("Pemasukan Berhasil Di Hapus", {
        title: "Sukses",
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
            text: "Pemasukan Ini Akan Di Hapus Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal("Pemasukan Tetap Tersimpan!");
            }
        });
    });
</script>

@endsection