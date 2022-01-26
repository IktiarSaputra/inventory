@extends('layouts.master')

@section('title')
Transaksi
@endsection

@section('css')
<meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="section-header">
    <h1>Transaksi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Transaksi</div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Search Produk</h4>
                    <div class="card-header-action">
                        <form>
                            <div class="input-group">
                                <input type="number" class="form-control" id="search" autofocus placeholder="Masukan Kode Produk"
                                name="search">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col" class="text-center">Subtotal</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach ($carts as $row)
                                    @php $total += $row['price'] * $row['quantity'] @endphp
                                    <tr data-id="{{ $row['id'] }}">
                                        <td data-th="Product">
                                            {{ $row['name'] }}
                                        </td>
                                        <td data-th="Price">Rp.{{ number_format($row['price']) }}</td>
                                        <td data-th="Quantity" >
                                            <input type="number" value="{{ $row['quantity'] }}" min="1" max="{{ $row['attributes']['stok'] }}" class="form-control p-2 quantity update-cart" />
                                        </td>
                                        <td data-th="Subtotal" class="text-center">Rp.{{ number_format($row['price'] * $row['quantity']) }}</td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    @if ($total == 0)
                                        <td colspan="3" class="text-left"><strong>Total Rp. {{ number_format($total) }}</strong></td>
                                        <td colspan="5" class="text-right">
                                            <a href="{{ route('productOut.checkout') }}" class="btn btn-primary btn-block disabled">Checkout</a>
                                        </td>
                                    @else
                                        <td colspan="2" class="text-left"><strong>Total Rp. {{ number_format($total) }}</strong></td>
                                        <td class="text-right">Uang Pembayaran :</td>
                                        <td colspan="2" class="text-right">
                                            <form action="{{ route('productOut.checkout') }}" method="post">
                                                @csrf
                                                <div class="form-group row m-auto">
                                                    <div class="col-6">
                                                        <input type="hidden" name="total" value="{{ $total }}">
                                                        <input type="number" name="uang" id="" class="form-control" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <button type="submit" class="btn btn-primary btn-block">Checkout</button>
                                                    </div>
                                                </div>
                                            </form>
                                            {{-- <a href="{{ route('productOut.checkout') }}" class="btn btn-primary btn-block">Checkout</a> --}}
                                        </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
{{-- <script type="text/javascript">
    $('#search').on('keyup', function () {
        $value = $(this).val();
        var xhr =  $.ajax({
            type: 'get',
            url: '{{URL::to('/admin/search')}}',
            data: {
                'search': $value
            },
            success: function (data) {
                console.log(data);
            }

        });
        // xhr.abort();
    })
</script> --}}

<script>
$('#search').on('keyup', function () {
    var kode = $(this).val();
    $.ajax({
        url: '/admin/search/' + kode,
        type: "GET",
        async: false, 
        data: {},
        success: function (data) {
            var kodes = data.kode;
            $("#search").val(null);
            console.log(kodes); 
            $.ajax({
                url: '/admin/product/add-to-cart/' + kodes,
                type: "GET",
                data: {},
                success: function (response) {
                    console.log(response);
                    location.reload();
                }
            });
        }
    });
});

// $('#search').on('keyup', function () {
//         $.ajax({
//             url: "{{ url('/admin/product/add-to-cart') }}",
//             type: "POST",
//             data: {
//                 kode: $(this).val(),
//             },
//             success: function (data) {
//                 location.reload();
//             }
//         });
// });
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    location.reload();
                }
            });
        }
    });
  
</script>
@endsection