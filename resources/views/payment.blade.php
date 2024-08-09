<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script id="midtrans-script" type="text/javascript"
        src="https://api.sanbox.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js" data-environment="sandbox"
        data-client-key="SB-Mid-client-zBGmz6N1Pw3HTXwf"></script> --}}
    <script id="midtrans-script" type="text/javascript"
        src="https://api.sandbox.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js" data-environment="sandbox"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/picomodal/3.0.0/picoModal.min.js"></script>
    <script>
        /**
         * Example helper functions to open Iframe popup, you may replace this with your own 
         * method of open iframe. In this example, PicoModal library is used (first include/import this: https://cdnjs.cloudflare.com/ajax/libs/picomodal/3.0.0/picoModal.min.js)
         */
        var popupModal = (function() {
            var modal = null;
            return {
                openPopup(url) {
                    modal = picoModal({
                        content: '<iframe frameborder="0" style="height:90vh; width:100%;" src="' + url +
                            '"></iframe>',
                        width: "75%",
                        closeButton: false,
                        overlayClose: false,
                        escCloses: false
                    }).show();
                },
                closePopup() {
                    try {
                        modal.close();
                    } catch (e) {}
                }
            }
        }());
    </script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #ffffff;
            font-family: 'Arial', sans-serif;
        }

        .payment-container {
            background-color: #292929;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 90%;
            max-width: 400px;
        }

        .payment-container2 {
            max-height: 300px;
            overflow-y: auto;
            overflow-x: hidden;
            border-radius: 8px;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); */
            width: 100%;
            /* max-width: 300px; */
        }

        .payment-container3 {
            /* background-color: #292929; */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* padding: 5px; */
            width: 90%;
            max-width: 400px;
            align-content: center;
        }

        /* Gaya scroll bar */
        .payment-container2::-webkit-scrollbar {
            width: 8px;
            /* Atur lebar scroll bar */
        }

        .payment-container2::-webkit-scrollbar-thumb {
            background-color: #555555;
            border-radius: 10px;
        }

        .payment-container2::-webkit-scrollbar-track {
            background: #333333;
        }

        /* Untuk Firefox */
        .payment-container2 {
            scrollbar-width: thin;
            /* Menetapkan lebar scroll bar menjadi lebih kecil */
            scrollbar-color: #555555 #333333;
            /* Gaya untuk thumb dan track */
        }

        .payment-box {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .payment-box2 {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 400px;
        }

        h2 {
            color: #ffffff;
            margin: 0;
            font-size: 1.5rem;
        }

        h6 {
            /* background-color: #c3c3c3; */
            color: #1b1b1b;
            margin: 10px 2px 0px 2px;
            font-size: 2.3rem;
            border-radius: 4px;
            width: 100%
        }

        p {
            color: #ffffff;
            text-align: center;
        }

        .plan-box {
            background-color: #333333;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            width: 100%;
            margin: 15px 0;
        }

        .plan-info {
            display: flex;
            align-items: center;
        }

        .plan-info img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .plan-title {
            color: #ffffff;
            margin: 0;
        }

        .change-plan {
            color: #357edd;
            text-decoration: none;
            font-size: 0.8rem;
        }

        .plan-price {
            display: flex;
            align-items: baseline;
            color: #ffffff;
        }

        .plan-price .amount {
            font-size: 1.5rem;
            margin: 0 5px;
        }

        h3 {
            color: #ffffff;
            margin: 20px 0 10px;
            align-self: flex-start;
        }

        h4 {
            color: #000000;
            margin: 10px 0 5px;
            align-self: flex-center;
        }

        .method-label {
            color: #ffffff;
            align-self: flex-start;
            margin: 5px 0;
            text-align: left;
            width: 100%;
        }

        .payment-method {
            background-color: #333333;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            width: 95%;
            margin: 5px 0;
        }

        .payment-method:hover {
            background-color: #686767;
            /* Warna background saat hover */
            border-color: #7a7a7a;
            /* Warna border saat hover */
            transition: background-color 0.3s, border-color 0.3s;
        }

        .payment-method2 {
            /* background-color: #333333; */
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* padding: 10px; */
            width: 95%;
            /* margin: 5px 0; */
        }

        .payment-method3 {
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .card-info {
            display: flex;
            align-items: center;
        }

        .card-info img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            border-radius: 5px;

        }

        .card-title,
        .card-number {
            color: #ffffff;
            margin: 0;
        }

        .cvc-button {
            background-color: #444444;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .cvc-button:hover {
            background-color: #555555;
        }

        .cvc-button {
            background-color: #444444;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .bank-buttons {
            display: none;
            flex-wrap: wrap;
            gap: 10px;
            /* margin-top: 10px; */
        }

        .bank-button {
            background-color: #ffffff;
            color: #333333;
            border: 1px solid #7a7a7a;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background-color 0.3s;
            /* Tambahkan transition untuk efek yang lebih halus */
        }

        .bank-button:hover {
            background-color: #cccccc;
            /* Warna abu-abu saat hover */
        }

        /* .bank-button.selected img {
           background-color: #585858;  /* Border saat terpilih */
        /* } */

        .bank-button img {
            /* width: 25px; */
            height: 30px;
        }

        .add-method {
            color: #357edd;
            text-decoration: none;
            align-self: flex-start;
            margin: 10px 0;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .payment-button {
            background-color: #357edd;
            margin-top: 10px;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            font-size: 1rem;
        }

        .payment-button2 {
            background-color: #02a726;
            margin-top: 10px;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px;
            width: 80%;
            cursor: pointer;
            font-size: 1rem;
        }

        .payment-button3 {
            background-color: #ffd900;
            margin-top: 10px;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px;
            width: 80%;
            cursor: pointer;
            font-size: 1rem;
        }

        .payment-button4 {
            background-color: #ff0400;
            margin-top: 10px;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px;
            width: 80%;
            cursor: pointer;
            font-size: 1rem;
        }

        .payment-button:hover {
            background-color: #2b64cc;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #ffffff
        }

        .form-group {
            margin-bottom: 2px;
            /* Increase bottom margin for spacing between form groups */
        }

        .form-group input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group .input-inline {
            display: inline-block;
            width: calc(50% - 10px);
        }

        .form-group .input-inline:first-child {
            margin-right: 20px;
        }

        .form-group .input-inline input {
            width: 100%;
        }

        .form-group.flex-container {
            display: flex;
            align-items: center;
            gap: 20px;
            /* Space between the inputs */
        }

        .form-group.flex-container input {
            flex: 1;
        }

        .form-group.flex-container .input-cvv {
            margin-left: 10px;
            /* Additional margin to the left of CVV input */
        }

        .form-group.flex-container .form-group:last-child {
            flex: 0 0 130px;
            /* Set a fixed width for CVV input */
        }

        .qr-code-img {
            width: 100%;
            /* Lebar gambar QR code 90% dari lebar kontainer */
            max-width: 400px;
            /* Maksimum lebar gambar untuk menghindari ukuran terlalu besar */
            height: 200px;
            /* Tinggi otomatis untuk menjaga aspek rasio */
            object-fit: contain;
            /* Menjaga aspek rasio gambar */
            display: block;
            /* Menghilangkan jarak bawah default pada gambar */
        }

        .state-code-img {
            width: 100%;
            /* Lebar gambar QR code 90% dari lebar kontainer */
            max-width: 400px;
            /* Maksimum lebar gambar untuk menghindari ukuran terlalu besar */
            height: 300px;
            /* Tinggi otomatis untuk menjaga aspek rasio */
            object-fit: contain;
            /* Menjaga aspek rasio gambar */
            display: block;
            /* Menghilangkan jarak bawah default pada gambar */
        }

        .containerr {
            width: 100%;
            /* max-width: 400px; */
            /* margin: 20px auto; */
            background-color: #292929;
            border-radius: 8px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            /* padding: 20px; */
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header .time-remaining {
            background-color: #f54e4e;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
            color: #ffffff;
        }

        .account-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 10px;
            /* background-color: #bcb9b9;
            border-radius: 8px;
            padding: 10px; */
        }

        .account-info img {
            height: 30px;
        }

        .account-details {
            margin-bottom: 20px;
            text-align: left;
            border-bottom: 1px solid white;
        }

        .account-details p {
            margin: 5px 0;
            font-size: 16px;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .account-details p .label {
            font-weight: bold;
        }

        .account-details p .value {
            background-color: #ffffff;
            padding: 5px 10px;
            color: #000;
            border-radius: 5px;
            display: inline-block;
            font-family: monospace;
        }

        .details-link,
        .payment-link {
            color: #ffffff;
            text-decoration: none;
            font-weight: normal;
            display: inline-block;
            margin: 10px 0;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .buttons .shop-button {
            background-color: #1b9b87;
            color: #fff;
        }

        .buttons .status-button {
            background-color: #fff;
            color: #1b9b87;
            border: 2px solid #1b9b87;
        }

        .container {
            background-color: #292929;
            border-radius: 8px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            width: 100%;
            /* max-width: 400px; */
            /* padding: 20px; */
            /* box-sizing: border-box; */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 20px;
            margin: 0;
        }

        .header img {
            height: 30px;
        }

        .account-details {
            margin-bottom: 20px;
        }

        .account-details p {
            margin: 5px 0;
            font-size: 16px;
        }

        .account-details .label {
            color: #ffffff;
        }

        .account-details .value {
            font-weight: bold;
            display: inline-block;
        }

        .account-details .copy-link {
            color: #1b9b87;
            text-decoration: none;
            font-weight: bold;
            margin-left: 10px;
        }

        .action-links {
            text-align: center;
            margin-bottom: 20px;
        }

        .action-links a {
            color: #ffffff;
            text-decoration: none;
            font-weight: normal;
            display: inline-block;
            margin: 10px 0;
        }

        .payment-success {
            /* width: 100%; */
            text-align: center;
            background: #fff;
            height: 500px;
            padding: 5px;
            margin: 0.5px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .payment-success .icon {
            margin-bottom: 20px;
        }

        .payment-success .icon img {
            width: 300px;
            height: 300px;
        }

        .payment-success .message {
            font-size: 1.5em;
            color: #333;
        }

        .form-group .is-invalid {
            border-color: #dc3545;
            border-top-width: 2px;
            border-right-width: 2px;
            border-bottom-width: 2px;
            border-left-width: 2px;
            border-style: solid;
        }

        .step-container {
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .step {
            display: flex;
            align-items: center;
            /* margin-bottom: 20px; */
            position: relative;
        }

        .step-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ddd;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            /* margin-right: 10px; */
            position: relative;
            z-index: 1;
        }

        .step-number.completed {
            background-color: #4caf50;
        }

        .step-number.active {
            background-color: #2196f3;
        }

        .step-number.third {
            background-color: #d30000;
        }

        .step-number.four {
            background-color: #eac700;
        }

        .step-number.five {
            background-color: #9500ff;
        }

        .step-number.six {
            background-color: #000000;
        }

        .step-details {
            /* background-color: #fff; */
            border-radius: 5px;
            padding: 10px 20px;
            /* max-width: 500px; */
            /* box-shadow: 0 2px 5px rgba(195, 195, 195, 0.1); */
        }

        .step-details h2 {
            font-size: 10px;
            margin: 0;

        }

        .step-details p {
            color: #ffffff;
            text-align: left;
        }

        .step-title {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .step-description {
            margin: 4px 0 0;
            font-size: 12px;
            color: #666;
        }

        .step::after {
            content: '';
            position: absolute;
            width: 5px;
            height: 100%;
            background-color: #122a7b;
            top: 24px;
            left: 12px;
            z-index: 0;
        }

        .step:last-child::after {
            display: none;
        }
    </style>
</head>

<body>
    <div class="payment-container" id="payment-container" style="display:block">
        <div class="payment-box" id="payment-box">
            <h2>PAYMENT</h2>
            <p>Please make the payment to start enjoying all the features of our premium plan as soon as possible</p>
            <div class="plan-box">
                <span style="display: none" id="order_code" style="color: #ccc">{{ $orderCode }}</span>
                <div class="plan-info">
                    <img src="images/ck.png" alt="Small Business">
                    <div>
                        <h3 class="plan-title" id="customerName"> {{ $name }}</h3>
                        <a class="change-plan">TOTAL PAYMENT</a>
                    </div>
                </div>
                <div class="plan-price">
                    <span class="amount">Rp</span>
                    <span class="amount" id="total_price">{{ $totalPrice }}</span>
                    {{-- <span>/ year</span> --}}
                </div>
            </div>
            <h3 id="method-choice" style="display: block">Pilih Metode Pembayaran</h3>
            <h3 style="display: none">Bayar Sebelum</h3>
            <div id="card1" class="payment-container2">
                <div id="credit-card">
                    <p class="method-label">Credit/debit card</p>
                    <div class="payment-method" onclick="toggleCards()">
                        <div class="card-info">
                            <div>
                                <img src="images/mc.png" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/vc.png" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/jbc.png" alt="Credit Card">
                            </div>
                        </div>
                        <button class="cvc-button" onclick="getCreditCardToken()">Pilih</button>
                    </div>
                </div>
                <div id="virtual-account">
                    <p class="method-label"><span class="label">Virtual Account</span></p>
                    <div class="payment-method" onclick="toggleBankButtons()">
                        <div class="card-info">
                            <div>
                                <img src="images/mandiri.jpg" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/bni.webp" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/bri.webp" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/permata.jpg" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/cimb.jpg" alt="Credit Card">
                            </div>
                        </div>
                        <button class="cvc-button" onclick="toggleBankButtons()">Pilih</button>
                    </div>
                    <div class="bank-buttons" id="bank-buttons">
                        <button class="bank-button" id="mandiri" onclick="mandiriBill()">
                            <img src="images/mandiri.png" height="30px" width="60px" alt="Credit Card">
                        </button>
                        <button class="bank-button" id="bni" onclick="selectBank()">
                            <img src="images/bni.png" height="20px" width="60px" alt="Credit Card">
                        </button>
                        <button class="bank-button" id="bri" onclick="selectBank()">
                            <img src="images/bri.png" height="30px" width="60px" alt="Credit Card">
                        </button>
                        <button class="bank-button" id="permata" onclick="selectBank()">
                            <img src="images/permata.png" height="20px" width="70px" alt="Credit Card">
                        </button>
                        <button class="bank-button" id="cimb" onclick="selectBank()">
                            <img src="images/cim.png" height="30px" width="60px" alt="Credit Card">
                        </button>

                        <button class="bank-button" id="others" onclick="selectBank()">
                            Other Banks
                        </button>
                    </div>
                </div>
                <div id="qris">
                    <p class="method-label">Qris</p>
                    <div class="payment-method" onclick="qris()">
                        <div class="card-info">
                            <div>
                                <img src="images/qris.png" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/ovo.png" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/dana.jpg" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/link.png" alt="Credit Card">
                            </div>
                        </div>
                        <button class="cvc-button">Pilih</button>
                    </div>
                </div>

                <div id="gopay">
                    <p class="method-label">GoPay/GoPaylater</p>
                    <div class="payment-method" onclick="gopayCards()">
                        <div class="card-info" id="gopay">
                            <div>
                                <img src="images/gopay.jpg" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/gopaylat.jpg" alt="Credit Card">
                            </div>
                            <div>
                                <img src="images/qris.png" alt="Credit Card">
                            </div>
                        </div>
                        <button class="cvc-button" id="qr" onclick="toggleCards()">Pilih</button>
                    </div>
                </div>
            </div>
            <div id="status-payment" class="payment-container2" style="display: none">
                <div class="payment-success">
                    <div class="payment-method3">
                        <img src="images/success.gif" alt="Checkmark Icon" class="qr-code-img">
                    </div>
                    <div class="message">
                        <h4> IDR 1,0000,000 </h4>
                        <h4> Payment Successful ! </h4>
                    </div>
                </div>
            </div>
            <div id="card3" class="payment-container2" style="display: none;">
                <div class="payment-method3">
                    <img src="images/loading.gif" id="qr-code-img" class="qr-code-img" alt="QR Code">
                </div>
            </div>
            <div id="cardgopay" class="payment-container2" style="display: none;">
                <div class="payment-method3">
                    <img src="images/loading.gif" id="gopay-code-img" class="qr-code-img" alt="QR Code">
                </div>
            </div>
            <div id="cardbank" class="payment-container2" style="display: none;">
                <div class="payment-method2">
                    <div id="virtual-account-container" class="container">
                        <div class="account-info">
                            <p><span class="label">Virtual Account</span> </p>
                            <img src="images/loading.gif" id="logo-bank" alt="BNI Logo" width="50px"
                                height="20px">
                        </div>

                        <div class="account-details">
                            <p><span class="label">Bank code :</span> </p>
                            <p> <span class="value" id="bank-code"></span> <a href="#" class="payment-link"
                                    onclick="copyText('virtual-account')">Copy</a></p>

                        </div>
                        <div class="account-details">
                            <p><span class="label">Nomor Virtual Account :</span> </p>
                            <p> <span class="value" id="va-number"></span> <a href="#" class="payment-link"
                                    onclick="copyText('va-number', this)">Copy</a></p>
                                    

                        </div>
                        <a onclick="stepBank()" class="payment-link">How To Pay</a>
                        <div class="step-container" id="step-bank" style="display: none">
                            <div id="step-bank-bri-container" style="display: none">
                                <div class="step">
                                    <div class="step-number completed">1</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">First Step</h2> --}}
                                        <p id="step-1" class="step-description">Select payment.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number active">2</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">Second Step</h2> --}}
                                        <p class="step-description">Select BRIVA.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number third">3</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">Third Step</h2> --}}
                                        <p class="step-description">insert BRIVA number, then confirm.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number four">4</div>
                                    <div class="step-details">
                                        {{-- <h3 class="step-title">Finish</h3> --}}
                                        <p class="step-description">Payment completed.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="step-bank-bni-container" style="display: none">
                                <div class="step">
                                    <div class="step-number completed">1</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">First Step</h2> --}}
                                        <p id="step-1" class="step-description">Select transfer.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number active">2</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">Second Step</h2> --}}
                                        <p class="step-description">Select virtual account billing.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number third">3</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">Third Step</h2> --}}
                                        <p class="step-description">Select the debit account you want to use.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number four">4</div>
                                    <div class="step-details">
                                        {{-- <h3 class="step-title">Finish</h3> --}}
                                        <p class="step-description">Insert the virtual account number, then confirm.
                                        </p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number five">5</div>
                                    <div class="step-details">
                                        {{-- <h3 class="step-title">Finish</h3> --}}
                                        <p class="step-description">Payment completed.</p>
                                    </div>
                                </div>
                            </div>
                            <div id="step-bank-cimb-container" style="display: none">
                                <div class="step">
                                    <div class="step-number completed">1</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">First Step</h2> --}}
                                        <p id="step-1" class="step-description">Select transfer menu.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number active">2</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">Second Step</h2> --}}
                                        <p class="step-description">Select transfer to other CIMB Niaga account.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number third">3</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">Third Step</h2> --}}
                                        <p class="step-description">Select your source account: CASA or rekening
                                            ponsel.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number four">4</div>
                                    <div class="step-details">
                                        {{-- <h3 class="step-title">Finish</h3> --}}
                                        <p class="step-description">Input the virtual account number.
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number five">5</div>
                                    <div class="step-details">
                                        {{-- <h3 class="step-title">Finish</h3> --}}
                                        <p class="step-description">Input the payable amount.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number six">6</div>
                                    <div class="step-details">
                                        {{-- <h3 class="step-title">Finish</h3> --}}
                                        <p class="step-description">Follow the instructions to complete the payment.
                                        </p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number five">7</div>
                                    <div class="step-details">
                                        {{-- <h3 class="step-title">Finish</h3> --}}
                                        <p class="step-description">Payment completed.</p>
                                    </div>
                                </div>
                            </div>
                            <div id="step-bank-permata-container" style="display: none">
                                <div class="step">
                                    <div class="step-number completed">1</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">First Step</h2> --}}
                                        <p id="step-1" class="step-description">Select other transactions on the
                                            main menu.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number active">2</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">Second Step</h2> --}}
                                        <p class="step-description">Select payment.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number third">3</div>
                                    <div class="step-details">
                                        {{-- <h2 class="step-title">Third Step</h2> --}}
                                        <p class="step-description">Select other payments.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number four">4</div>
                                    <div class="step-details">
                                        {{-- <h3 class="step-title">Finish</h3> --}}
                                        <p class="step-description">Select virtual account.
                                        </p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number five">5</div>
                                    <div class="step-details">
                                        {{-- <h3 class="step-title">Finish</h3> --}}
                                        <p class="step-description">Insert virtual account number, then confirm.</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-number six">6</div>
                                    <div class="step-details">
                                        {{-- <h3 class="step-title">Finish</h3> --}}
                                        <p class="step-description">Payment completed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mandiri-bill" class="payment-container2" style="display: none;">
                <div class="payment-method2">
                    <div id="mandiri-bill-container" class="container">
                        <div class="account-info">
                            <p><span class="label">Virtual Account</span> </p>
                            <img src="images/mandiri.png" alt="BNI Logo">
                        </div>
                        <div class="account-details">
                            <p><span class="label">company code :</span> </p>
                            <p> <span class="value" id="biller-code"></span> <a href="#" class="payment-link"
                                    onclick="copyText('virtual-account')">Copy</a></p>
                        </div>
                        <div class="account-details">
                            <p><span class="label">Nomor Virtual Account :</span> </p>
                            <p> <span class="value" id="bill-key"></span> <a href="#" class="payment-link"
                                    onclick="copyText('virtual-account')">Copy</a></p>
                        </div>
                        <a onclick="selectStep()" class="payment-link">Lihat Cara Pembayaran</a>
                        <div class="step-container" id="step-container" style="display: none">
                            <div class="step">
                                <div class="step-number completed">1</div>
                                <div class="step-details">
                                    {{-- <h2 class="step-title">First Step</h2> --}}
                                    <p class="step-description">Select payment on the main menu</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number active">2</div>
                                <div class="step-details">
                                    {{-- <h2 class="step-title">Second Step</h2> --}}
                                    <p class="step-description">Select Ecommerce.</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number third">3</div>
                                <div class="step-details">
                                    {{-- <h2 class="step-title">Third Step</h2> --}}
                                    <p class="step-description">Select Midtrans in the service provider field.</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number four">4</div>
                                <div class="step-details">
                                    {{-- <h3 class="step-title">Finish</h3> --}}
                                    <p class="step-description">Input virtual account number in the payment code field.
                                    </p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number five">5</div>
                                <div class="step-details">
                                    {{-- <h3 class="step-title">Finish</h3> --}}
                                    <p class="step-description">Click continue to confirm.</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number six">6</div>
                                <div class="step-details">
                                    {{-- <h3 class="step-title">Finish</h3> --}}
                                    <p class="step-description">Payment complete</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="card2" class="payment-container2" style="display: none;">
                <div class="payment-method2">
                    <form>
                        <div class="form-group">
                            <label for="card_number">Card Number</label>
                            <input type="text" id="card_number" placeholder="Card Number" required>
                        </div>
                        <div class="form-group flex-container">
                            <div class="form-group">
                                <label for="card_exp_month">Exp Date</label>
                                <input type="text" id="card_exp_month" placeholder="Expire Month (MM)"
                                    maxlength="2" required>
                            </div>
                            <div class="form-group">
                                <label for="card_exp_year">Exp Year</label>
                                <input type="text" id="card_exp_year" placeholder="CVV" maxlength="2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="card_cvv">cvv</label>
                            <input type="text" id="card_cvv" name="cvv" maxlength="3" required>
                        </div>
                        <div class="form-group" style="margin-top: 10px">
                            <button id="button" class="payment-button" onclick="getCreditCardToken(event)"
                                style="display: block">KONFIRMASI</button>
                        </div>

                    </form>
                </div>
            </div>
            <button id="cek-status-payment" class="payment-button" onclick="cekstatus()" style="display: none">cek
                status</button>
            <button id="back-payment" class="payment-button" onclick="cekstatus()"
                style="display: none">Back</button>
        </div>
    </div>
    <div class="payment-container3" id="payment-sukses" style="display: none">
        <div class="payment-success">
            <h6>STATUS PAYMENT</h6>

            <div class="payment-method3">
                <img id="images" src="images/success.gif" alt="Checkmark Icon" class="state-code-img"
                    style="display: none">
            </div>
            <div class="message" id="pay-success" style="display: none">
                <h4> IDR 1,0000,000 </h4>
                <h4> Payment Successful ! </h4>
            </div>
            <div class="message" id="pay-pending" style="display: none">
                <h4> WAITING PAYMENT ! </h4>
            </div>
            <div class="message" id="pay-failed" style="display: none">
              <h4>X FAILED X</h4>
            </div>
            <button id="back-payment-cek" class="payment-button2" onclick="cekstatus()">Pending</button>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const grossAmount = parseFloat(document.getElementById('total_price').textContent);
        const creditCard = document.getElementById('credit-card');
        const virtualAccount = document.getElementById('virtual-account');
        const qris = document.getElementById('qris');
        const gopay = document.getElementById('gopay');

        var totalPriceElement = document.getElementById('total_price');
        var totalPrice = parseInt(totalPriceElement.textContent);
        totalPriceElement.textContent = totalPrice.toLocaleString('id-ID');

        if (grossAmount > 10000000) {
            gopay.style.display = 'none';
        }
    });

    let codeBank = '';

    function toggleBankButtons() {
        const bankButtons = document.getElementById('bank-buttons');
        bankButtons.style.display = bankButtons.style.display === 'none' || bankButtons.style.display === '' ? 'flex' :
            'none';
    }

    function toggleCards() {
        const card1 = document.getElementById('card1');
        const card2 = document.getElementById('card2');

        card1.style.display = 'none';
        card2.style.display = 'block';

    }

    function toggleToCard1() {
        const card1 = document.getElementById('card1');
        const card2 = document.getElementById('card2');

        card1.style.display = 'block';
        card2.style.display = 'none';


    }

    async function getCreditCardToken(e) {
        e.preventDefault();

        let isValid = true;

        const fields = ['card_number', 'card_exp_month', 'card_exp_year', 'card_cvv'];
        fields.forEach(field => {
            const input = document.getElementById(field);
            if (input.value.trim() === '') {
                input.classList.add('is-invalid');
                isValid = false;
            } else {
                input.classList.remove('is-invalid');
            }
        });

        if (isValid) {
            // card data from customer input, for example
            var cardData = {
                "card_number": document.getElementById('card_number').value,
                "card_exp_month": document.getElementById('card_exp_month').value,
                "card_exp_year": document.getElementById('card_exp_year').value,
                "card_cvv": document.getElementById('card_cvv').value,
            };

            // callback functions
            var options = {
                onSuccess: async function(response) {

                    const token_id = response.token_id;
                    // console.log('This is the card token_id:', token_id);
                    const customerName = document.getElementById('customerName').textContent;
                    const orderID = document.getElementById('order_code').textContent;
                    const grossAmount = document.getElementById('total_price').textContent;
                    // Success to get card token_id, implement as you wish here
                    //  console.log('Success to get card token_id, response:', response);

                    try {
                        const response = await fetch('/credit-card', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                name: customerName,
                                order_id: orderID,
                                gross_amount: grossAmount,
                                token_id: token_id

                            })
                        });

                        const responseData = await response.json();

                        if (responseData.success) {
                            const redirect_url = responseData.data.redirect_url;
                            var popupModal = (function() {
                                var modal = null;
                                return {
                                    openPopup(redirect_url) {
                                        modal = picoModal({
                                            content: '<iframe frameborder="0" style="height:90vh; width:100%;" src="' +
                                                redirect_url + '"></iframe>',
                                            width: "75%",
                                            closeButton: false,
                                            overlayClose: false,
                                            escCloses: false
                                        }).show();
                                    },
                                    closePopup() {
                                        try {
                                            modal.close();
                                        } catch (e) {}
                                    }
                                }
                            }());
                            // callback functions
                            var options = {
                                performAuthentication: function(redirect_url) {
                                    // Implement how you will open iframe to display 3ds authentication redirect_url to customer
                                    popupModal.openPopup(redirect_url);
                                },
                                onSuccess: function(response) {
                                    // 3ds authentication success, implement payment success scenario
                                    console.log('response:', response);
                                    alert('sukses');
                                    popupModal.closePopup();
                                    // // Simulate an HTTP redirect:
                                    window.location.replace("{{ env('APP_URL') }}/order-direct");
                                },
                                onFailure: function(response) {
                                    // 3ds authentication failure, implement payment failure scenario
                                    console.log('response:', response);
                                    alert(response);
                                },
                                onPending: function(response) {
                                    // transaction is pending, transaction result will be notified later via 
                                    // HTTP POST notification, implement as you wish here
                                    console.log('response:', response);
                                    alert(response);
                                    popupModal.closePopup();
                                }
                            };

                            // trigger `authenticate` function
                            MidtransNew3ds.authenticate(redirect_url, options);
                        } else {
                            console.error('Error:', responseData.error);
                        }
                    } catch (error) {
                        console.error('Fetch Error:', error);
                        alert('An error occurred while processing your payment. Please try again.');
                    }


                    // Implement sending the token_id to backend to proceed to next step
                },
                onFailure: function(response) {
                    // Fail to get card token_id, implement as you wish here
                    console.log('Fail to get card token_id, response:', response);

                    // you may want to implement displaying failure message to customer.
                    // Also record the error message to your log, so you can review
                    // what causing failure on this transaction.
                }
            };

            // trigger `getCardToken` function
            MidtransNew3ds.getCardToken(cardData, options);
        } else {
            alert('Please fill in all fields');
        }
    }


    async function qris() {

        const method = document.getElementById('method-choice');
        const card1 = document.getElementById('card1');
        const card3 = document.getElementById('card3');
        const button = document.getElementById('cek-status-payment');

        const customerName = document.getElementById('customerName').textContent;
        const orderID = document.getElementById('order_code').textContent;
        const grossAmount = document.getElementById('total_price').textContent;
        const bank = event.currentTarget.id;

        card1.style.display = 'none';
        card3.style.display = 'block';
        method.style.display = 'none';
        button.style.display = 'block';

        const response = await fetch('/qris', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                name: customerName,
                order_id: orderID,
                gross_amount: grossAmount
            })
        });

        const responseData = await response.json();
        if (responseData.success) {
            console.log(responseData.data.actions[0].url)
            const qrisCode = responseData.data.actions[0].url;

            const qrCodeImg = document.getElementById('qr-code-img');
            qrCodeImg.src = qrisCode;

        }

    }

    async function gopayCards() {

        const method = document.getElementById('method-choice');
        const card1 = document.getElementById('card1');
        const card3 = document.getElementById('cardgopay');
        const button = document.getElementById('cek-status-payment');

        const customerName = document.getElementById('customerName').textContent;
        const orderID = document.getElementById('order_code').textContent;
        const grossAmount = document.getElementById('total_price').textContent;
        const bank = event.currentTarget.id;

        card1.style.display = 'none';
        card3.style.display = 'block';
        method.style.display = 'none';
        button.style.display = 'block';

        const response = await fetch('/gopay', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                name: customerName,
                order_id: orderID,
                gross_amount: grossAmount
            })
        });

        const responseData = await response.json();
        if (responseData.success) {
            console.log(responseData.data.actions[0].url)
            const qrisCode = responseData.data.actions[0].url;

            const gopayCodeImg = document.getElementById('gopay-code-img');
            gopayCodeImg.src = qrisCode;

        }
    }



    async function selectBank() {

        const method = document.getElementById('method-choice');
        const card1 = document.getElementById('card1');
        const card5 = document.getElementById('cardbank');
        const button = document.getElementById('cek-status-payment');


        const customerName = document.getElementById('customerName').textContent;
        const orderID = document.getElementById('order_code').textContent;
        const grossAmount = document.getElementById('total_price').textContent;
        const bank = event.currentTarget.id;

        card1.style.display = 'none';
        card5.style.display = 'block';
        button.style.display = 'block';
        method.style.display = 'none';

        const response = await fetch('/va', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                name: customerName,
                order_id: orderID,
                gross_amount: grossAmount,
                bank: bank
            })
        });

        const responseData = await response.json();
        if (responseData.success) {
            if (responseData.data.status_message != 'Success, PERMATA VA transaction is successful') {
                const vaNumber = responseData.data.va_numbers[0].va_number;
                codeBank = responseData.data.va_numbers[0].bank;
                const logoBank = document.getElementById('logo-bank');
                const stapBankContainer = document.getElementById('step-bank-bni-container');
                const stapBankContainer1 = document.getElementById('step-bank-bri-container');
                if (codeBank === 'bni') {
                    logoBank.src = 'images/bni.png'
                    stapBankContainer.style.display = 'blok';
                    stapBankContainer1.style.display = 'none';
                } else if (codeBank === 'cimb') {
                    logoBank.src = 'images/cim.png'
                } else if (codeBank === 'bri') {
                    logoBank.src = 'images/bri.png'
                }
                const vaNumberContainer = document.getElementById('virtual-account-container');
                const vaNumberElement = document.getElementById('va-number');
                const codeBankElement = document.getElementById('bank-code');
                vaNumberElement.textContent = vaNumber;
                codeBankElement.textContent = codeBank;
                vaNumberContainer.style.display = 'block';
            } else {
                const vaNumber = responseData.data.permata_va_number;
                const codeBank = responseData.data.bank;
                const logoBank = document.getElementById('logo-bank');
                logoBank.src = 'images/permata.png'
                const vaNumberContainer = document.getElementById('virtual-account-container');
                const vaNumberElement = document.getElementById('va-number');
                const codeBankElement = document.getElementById('bank-code')
                vaNumberElement.textContent = vaNumber;
                codeBankElement.textContent = 'Permata';
                vaNumberContainer.style.display = 'block';
            }
        } else {
            console.error('Error:', responseData.error);
        }
    }

    async function mandiriBill() {

        const method = document.getElementById('method-choice');
        const card1 = document.getElementById('card1');
        const mandiri = document.getElementById('mandiri-bill');
        const button = document.getElementById('cek-status-payment');

        method.style.display = 'none';
        card1.style.display = 'none';
        mandiri.style.display = 'block';
        button.style.display = 'block';


        const customerName = document.getElementById('customerName').textContent;
        const orderID = document.getElementById('order_code').textContent;
        const grossAmount = document.getElementById('total_price').textContent;
        const bank = event.currentTarget.id;



        const response = await fetch('/mandiri', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                name: customerName,
                order_id: orderID,
                gross_amount: grossAmount,
                bank: bank
            })
        });

        const responseData = await response.json();
        console.log(responseData)
        if (responseData.success) {
            // if (responseData.data.status_message != 'Success, PERMATA VA transaction is successful') {
            const vaNumber = responseData.data.bill_key;
            const companyCode = responseData.data.biller_code;
            const vaNumberContainer = document.getElementById('mandiri-bill-container');
            const vaNumberElement = document.getElementById('bill-key');
            const codeBiller = document.getElementById('biller-code');
            codeBiller.textContent = companyCode;
            vaNumberElement.textContent = vaNumber;
            vaNumberContainer.style.display = 'block';
        } else {
            console.error('Error:', responseData.error);
        }
    }

    async function cekstatus() {


        const card1 = document.getElementById('payment-container')
        const card2 = document.getElementById('payment-sukses')
        const button = document.getElementById('back-payment-cek');
        const orderID = document.getElementById('order_code').textContent;
        const grossAmount = document.getElementById('total_price').textContent;

        card1.style.display = 'none';
        card2.style.display = 'block';

        const response = await fetch('/cek-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                order_id: orderID
            })
        });

        const responseData = await response.json();
        console.log(responseData)

        var status = responseData.data.status_payment

        if (status === 'Unpaid') {
            const image = document.getElementById('images');
            const paySuccess = document.getElementById('pay-success');
            const payPending = document.getElementById('pay-pending');
            const payFailed = document.getElementById('pay-failed')
            image.src = 'images/pending.gif';
            image.style.display = 'block';
            payPending.style.display = 'block';
            paySuccess.style.display = 'none';
            payFailed.style.display = 'none';
            button.innerText = 'PENDING';
            button.className = 'payment-button3';
        } else if (status === 'Paid') {
            const image = document.getElementById('images');
            image.src = 'images/success.gif';
            image.style.display = 'block';
            payPending.style.display = 'none';
            paySuccess.style.display = 'block';
            payFailed.style.display = 'none';
            button.innerText = 'SUCCESS';
            button.className = 'payment-button2';
            setTimeout(function() {
                window.location.href = '{{ env('APP_URL') }}/order-direct';
            }, 2000);
        } else {
            const image = document.getElementById('images');
            image.src = 'images/reject.gif';
            image.style.display = 'block';
             payPending.style.display = 'none';
            paySuccess.style.display = 'none';
            payFailed.style.display = 'block';
            button.innerText = 'FAILED';
            button.className = 'payment-button4';
        }

    }

    function selectStep() {
        const stepContainer = document.getElementById('step-container');
        stepContainer.style.display = stepContainer.style.display === 'none' || stepContainer.style.display === '' ?
            'flex' : 'none';
    }

    function stepBank() {
        const stepContainer = document.getElementById('step-bank');
        const stepBankBri = document.getElementById('step-bank-bri-container');
        const stepBankBni = document.getElementById('step-bank-bni-container');
        const stepBankCimb = document.getElementById('step-bank-cimb-container');
        const stepBankPermata = document.getElementById('step-bank-permata-container');

        stepContainer.style.display = stepContainer.style.display === 'none' || stepContainer.style.display === '' ?
            'flex' : 'none';
        if (codeBank === 'bri') {
            stepBankBri.style.display = 'block';
            stepBankBni.style.display = 'none';
            stepBankCimb.style.display = 'none';
            stepBankPermata.style.display = 'none';
        } else if (codeBank === 'bni') {
            stepBankBri.style.display = 'none';
            stepBankBni.style.display = 'block';
            stepBankCimb.style.display = 'none';
            stepBankPermata.style.display = 'none';
        } else if (codeBank === 'cimb') {
            stepBankBri.style.display = 'none';
            stepBankBni.style.display = 'none';
            stepBankCimb.style.display = 'block';
            stepBankPermata.style.display = 'none';
        } else {
            stepBankBri.style.display = 'none';
            stepBankBni.style.display = 'none';
            stepBankCimb.style.display = 'none';
            stepBankPermata.style.display = 'block';
        }

    }

    function copyText(elementId, linkElement) {
         // Dapatkan elemen berdasarkan ID
        var copyText = document.getElementById(elementId);
        
        // Buat elemen textarea sementara untuk menyalin teks
        var textArea = document.createElement("textarea");
        textArea.value = copyText.textContent;
        document.body.appendChild(textArea);

        // Pilih teks dalam textarea
        textArea.select();
        textArea.setSelectionRange(0, 99999); // Untuk perangkat mobile

        // Salin teks ke clipboard
        document.execCommand("copy");

        // Hapus elemen textarea sementara
        document.body.removeChild(textArea);

        // Ubah teks link menjadi "Copied"
        linkElement.textContent = "Copied";
    }
</script>

</html>
