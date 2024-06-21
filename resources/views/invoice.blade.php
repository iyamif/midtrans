<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Durian - Invoice</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS for Invoice Styling -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            padding-top: 20px;
        }

        .card {
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 1.25rem;
        }

        .invoice-title {
            margin-bottom: 20px;
        }

        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-3 invoice-title">Invoice</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Pesanan</h5>
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>: {{ $order->name }}</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>: {{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{ $order->address }}</td>
                    </tr>
                    <tr>
                        <td>Qty</td>
                        <td>: {{ $order->qty }}</td>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td>: {{ $order->total_price }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: {{ $order->status }}</td>
                    </tr>
                </table>
                <a href="/" class="btn btn-primary btn-back">Kembali ke Katalog</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (bundle includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
