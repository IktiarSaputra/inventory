<!DOCTYPE html>
<html>

<head>
    <title>Inventory Version 1.0.0</title>
    <style>
        {
            margin: 0;
            padding: 0;
            font-family: arial;
            font-size: 6pt;
            color: #000;
        }

        body {
            width: 100%;
            font-family: arial;
            font-size: 6pt;
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
            margin-left: 0px;
        }

        #wrapper {
            width: 50mm;
            margin: 0 0mm;
        }

        #main {
            float: left;
            width: 0mm;
            background: #ffffff;
            padding: 0mm;
        }

        #sidebar {
            float: right;
            width: 0mm;
            background: #ffffff;
            padding: 0mm;
        }

        .page {
            height: 200mm;
            width: 50mm;
            page-break-after: always;
        }

        table {
            /** border-left: 1px solid #fff;
            border-top: 1px solid #fff; **/
            font-family: arial;
            border-spacing: 0;
            border-collapse: collapse;

        }

        table td {
            /**border-right: 1px solid #fff;
            border-bottom: 1px solid #fff;**/
            padding: 2mm;

        }

        table.heading {
            height: 0mm;
            margin-bottom: 1px;
        }

        h1.heading {
            font-size: 6pt;
            color: #000;
            font-weight: normal;
            font-style: italic;

        }

        h2.heading {
            font-size: 6pt;
            color: #000;
            font-weight: normal;
        }

        hr {
            color: #ccc;
            background: #ccc;
        }

        #invoice_body {
            height: auto;
        }

        #invoice_body,
        #invoice_total {
            width: 100%;
        }

        #invoice_body table,
        #invoice_total table {
            width: 100%;
            /** border-left: 1px solid #ccc;
            border-top: 1px solid #ccc; **/

            border-spacing: 0;
            border-collapse: collapse;

            margin-top: 0mm;
        }

        #invoice_body table td,
        #invoice_total table td {
            text-align: center;
            font-size: 8pt;
            /** border-right: 1px solid black;
            border-bottom: 1px solid black;**/
            padding: 0 0;
            font-weight: normal;
        }

        #invoice_head table td {
            text-align: left;
            font-size: 8pt;
            /** border-right: 1px solid black;
            border-bottom: 1px solid black;**/
            padding: 0 0;
            font-weight: normal;
        }

        #invoice_body table td.mono,
        #invoice_total table td.mono {
            text-align: right;
            padding-right: 0mm;
            font-size: 6pt;
            border: 1px solid white;
            font-weight: normal;
        }

        #footer {
            width: 44mm;
            margin: 0 2mm;
            padding-bottom: 1mm;
        }

        #footer table {
            width: 100%;
            /** border-left: 1px solid #ccc;
            border-top: 1px solid #ccc; **/

            background: #eee;

            border-spacing: 0;
            border-collapse: collapse;
        }

        #footer table td {
            width: 25%;
            text-align: center;
            font-size: 8pt;
            /** border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;**/
        }
    </style>
</head>

<body>
    <div id="wrapper">

        <div id="invoice_head">
            <table style="width:100%; border-spacing:0;">
                <tr>
                    <td style="font-size: 6pt; font-weight: bold;">
                        <b>Toko {{ config('app.name', 'Laravel') }}</b></td>
                    <td style="text-align:right;">
                        <p
                            style="text-align:right; font-size: 14px; font-weight:bold; border-bottom: black; border-top: black; border-right: black; border-left: black; ">
                        </p>
                    </td>
                </tr>
                <tr style="margin-top: 1px;">
                    <td>
                        <p style="text-align:left; font-size: 6pt; margin-top: 1px; font-weight: bold;"></p>
                    </td>
                    <td style="text-align:right;">
                        <p style="font-size: 6pt; font-weight: bold;">
                            <!--<img style="margin-top: 5px;" alt="<?php //$data['no_invoice'];?>" src="<?php //echo "barcode.php?size=15&text=DLV$_GET[id]"; ?>" /> </td>-->
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid black;" colspan="2"></td>
                </tr>

            </table>
        </div>

        <table class="heading" style="width:100%;">
            <tr>
                <td>
                    <center>
                        <p style="text-align:center; font-size: 6pt; font-weight:bold;">NOTA PENJUALAN</p>
                    </center>
                </td>
            </tr>
        </table>
        <table style="margin-top: -10px">
            <tr>
                <td>
                    <p style="text-align:left; font-size: 6pt; font-weight:bold;">Invoice : <br>
                        {{ $order->invoice }} </p>
                </td>
                <td>
                    <p style="text-align:left; font-size: 6pt; font-weight:bold;">Tanggal :
                        {{ $order->created_at->format('d/M/Y') }}
                </td>
            </tr>
        </table>

        <div id="content">

            <div id="invoice_body">
                <table border="1">

                    <tr>
                        <!--<td style="width:10%; font-size: 6pt;"><b>No</b></td>-->
                        <!--<td style="width:15%;"><b>Kode</b></td>-->
                        <td style="width:40%; font-size: 6pt;"><b>Nama Produk</b></td>
                        <td style="width:25%; font-size: 6pt;"><b>Harga</b></td>
                        <td style="width:10%; font-size: 6pt;"><b>Qty</b></td>
                        <td style="width:25%; font-size: 6pt;"><b>Jumlah</b></td>
                    </tr>
                    @foreach ($productout as $item)
                    <tr border="0">
                        <!--<td style="width:10%; text-align: center;" class="mono"><b><?php //echo $no; ?></b></td>-->
                        <!--<td style="width:15%; text-align: center;" class="mono"><b><?php //echo $data1['kd_produk']; ?></b></td>-->
                        <td style="width:40%; text-align: left;" class="mono">
                            <b>{{ $item->product->name }}</b></td>
                        <td style="width:25%;" class="mono">
                            <b>Rp. {{ number_format($item->product->price) }}</b></td>
                        <td style="width:10%; text-align: center;" class="mono"><b>{{ $item->qty }}</b></td>
                        <td style="width:25%;" class="mono"><b>Rp.{{ number_format($item->price) }}</b>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <div id="invoice_total">
                <table border="1">
                    <tr>
                        <td colspan="3" style="width:10%; font-size: 6pt;" class="mono"><b>
                                <center>Total
                            </b></center>
                        </td>
                        <td colspan="2" style="width:15%; font-size: 6pt;" class="mono">
                            <b>Rp.{{ number_format($order->subtotal) }}</b></td>
                    </tr>
                </table>
            </div>

            <div id="invoice_total">
                <table border="1">
                    <tr>
                        <td style="text-align: left; border: 1px solid white;"><b></b></td>
                        <td style="width:20%; border: 1px solid white;" class="mono"><b>
                                <center>
                            </b></center>
                        </td>
                        <td style="width:15%; border: 1px solid white;" class="mono"><b></b></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: left; font-size: 6pt; border: 1px solid white;"><b>PERHATIAN : <br> <span style="text-align: justify">1. Nota
                            ini adalah bukti pembelian barang <br>
                            <span>2.
                                Barang yang sudah dibeli tidak dapat di tukar atau dikembalikan.</span>
                        </span></b></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td style="text-align:center; font-size: 6pt; font-weight: bold;"><b>Terima kasih sudah berbelanja
                                di "{{ config('app.name', 'Laravel') }}" </b></td>
                        <td style="text-align:left; font-size: 6pt; font-weight: bold;"></td>
                        <td colspan="2" style="text-align:center; font-size: 10px; font-weight: bold;"></td>
                    </tr>
                    <tr>
                        <td style="text-align:left; font-size: 6pt; font-weight: normal;"><i></i></td>
                        <td style="text-align:left; font-size: 6pt; font-weight: bold;"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:left; font-size: 6pt;"><b></b></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:center; font-size: 6pt; font-weight: bold;"></td>
                    </tr>
                </table>
            </div>

        </div>
        <br />
    </div>
</body>

</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Belanja {{ $order->invoice }}</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<style>

</style>
</head>

<body>
    <p style="font-size: 9px;margin-top: -40px;margin-bottom:-200px;text-align:center">
        Toko {{ config('app.name', 'Laravel') }}
        <br> Struk Belanjaan
        <br>---------------------------------------------------------
    </p>
    <p style="font-size: 9px;text-align:center;">
        Invoice : &#160;&#160;&#160;&#160; {{ $order->invoice }}
        <br> Tanggal : &#160;&#160;&#160;&#160; {{ $order->created_at->format('d M Y H:i') }}
        <br>---------------------------------------------------------
    </p>
    <p style="font-size:9px;margin-top:-13px">
        <table style="font-size:9px">
            @foreach ($productout as $item)
            <tr>
                <td style="width: 60px">{{ $item->product->name }}</td>
                <td style="width: 20px">{{ $item->qty }}x</td>
                <td style="width: 65px">Rp. {{ number_format($item->price) }}</td>
            </tr>
            @endforeach
        </table>
    </p>
    <p style="font-size: 9px;text-align:center;">
        ---------------------------------------------------------
        <table style="font-size: 9px;margin-top:-13px;margin-bottom:-6px">
            <tr>
                <td style="width: 80px">Subtotal :</td>
                <td>Rp. {{ number_format($order->subtotal) }}</td>
            </tr>
            <tr>
                <td style="width: 80px">Total :</td>
                <td>Rp. {{ number_format($order->subtotal) }}</td>
            </tr>
        </table>
    </p>
    <p style="font-size: 8px;text-align:center">
        -----------------------------------------------------------------
        Terima Kasih Sudah Berbelanja di Toko {{ Auth::user()->app_name }} Kami
    </p>

</body>

</html> --}}