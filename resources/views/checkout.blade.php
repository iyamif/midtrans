<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script>
    <title>CheckOut</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .form-group label {
            flex: 0 0 120px;
            margin-right: 10px;
            text-align: left;
        }

        .form-group input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #pay-button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        #pay-button:hover {
            background-color: #45a049;
        }

        #pay-button:active {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            {{-- <img src="logo_url_here" alt="Boxcoin Logo"> --}}
        </div>
        <h2>Checkout</h2>
        {{-- <p>Untuk Melakukan Pembayaran Harap Masukan Data Dibawah Terlebih Dahulu</p>
        <h3>IDR / Rupiah</h3>
        <h4>Contact information</h4> --}}
        <h4>information</h4>

        <form onsubmit="return false">
            <div class="form-group">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" placeholder="Nama Lengkap" value="{{$order->name}}" readonly>
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Jumlah Nominal</label>
                <input type="text" id="price" placeholder="Masukan Nominal" value="{{$order->total_price}}" readonly>
            </div>

            <input type="text" id="snap-token" value="{{ $snapToken }}" hidden>
            <button id="pay-button">Pay!</button>
        </form>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        // For example trigger on button clicked, or any time you need
        payButton.addEventListener('click', function() {
            var snapToken = document.getElementById('snap-token').value;
            window.snap.pay(snapToken,{
                onSuccess : function (result){
                    alert('Berhasil')
                    window.location.href = '/invoice/{{$order->order_id}}'
                    
                },
                onPending : function (result){

                },
                onError : function (result){

                },
                onClose  : function (result){

                },
            });
        })
    </script>
</body>

</html>
