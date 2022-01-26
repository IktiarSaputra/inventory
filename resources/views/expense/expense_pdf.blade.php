<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengeluaran Periode {{ ($date[0]) }} - {{ $date[1] }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <h2 class="text-center"><b>Laporan Pengeluaran</b></h2>
    <h3 class="text-center text-info"><b>Inventory Barang</b></h3>
    <h4 class="text-center"><b>Periode {{ ($date[0]) }} - {{ $date[1] }}</b></h4>
    <table width="100%" class="table">
        <thead>
            <tr>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @forelse ($orders as $row)
            @if ($row->description == "Membeli")
            <tr>
                <td>{{ $row->description }} {{ $row->product->name }} Dari {{ $row->productin->suplier->name }}</td>
                <td>
                    {{ $row->created_at->format('d-m-Y') }}
                </td>
                <td>{{ $row->qty }}</td>
                <td>Rp {{ number_format($row->price) }}</td>
                <td>Rp. {{ number_format($row->subtotal) }}</td>
            </tr>
            @else
                <tr>
                    <td>
                        {{ $row->description }}
                    </td>
                    <td>
                        {{ $row->created_at->format('d-m-Y') }}
                    </td>
                    <td>{{ $row->qty }}</td>
                    <td>Rp {{ number_format($row->price) }}</td>
                    <td>Rp {{ number_format($row->subtotal) }}</td>
                </tr>
            @endif


            @php $total += $row->subtotal @endphp
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"><b>Total Pengeluaran :</b></td>
                <td>Rp {{ number_format($total) }}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>