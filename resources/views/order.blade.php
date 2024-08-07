<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
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

        h2 {
            color: #ffffff;
            margin: 0;
            font-size: 1.5rem;
        }

        p {
            color: #c7c7c7;
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
            /* display: flex; */
            justify-content: space-between;
            align-items: center;
            /* padding: 10px; */
            width: 100%;
            /* margin: 5px 0; */
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
            margin-top: 10px;
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
            width: 25px;
            height: 25px;
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
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
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
            margin-bottom: 20px;
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
            color: #666;
        }

        .account-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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

        /* Media Query untuk Mobile */
        @media (max-width: 480px) {
            body {
                padding: 5px;
            }

            .payment-container {
                width: 100%;
                max-width: 100%;
                padding: 10px;
            }

            h2 {
                font-size: 1rem;
                align-content: center
            }

            .plan-box {
                flex-direction: column;
                align-items: flex-start;
                padding: 5px;
            }

            .plan-price .amount {
                font-size: 1rem;
            }

            .payment-method {
                width: 100%;
            }

            .payment-box {
                align-items: flex-start;
            }

            .form-group.flex-container {
                flex-direction: column;
                gap: 5px;
            }

            .form-group.flex-container .input-inline {
                width: 100%;
            }

            .form-group.flex-container .form-group:last-child {
                width: 100%;
            }

            .buttons {
                flex-direction: column;
                gap: 5px;
            }
        }
          /* Media Query untuk Tablet */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .payment-container {
                width: 100%;
                max-width: 100%;
                padding: 15px;
            }

            h2 {
                font-size: 1.2rem;
            }

            .plan-box {
                flex-direction: column;
                align-items: flex-start;
            }

            .plan-price .amount {
                font-size: 1.2rem;
            }

            .payment-method {
                width: 100%;
            }

            .payment-box {
                align-items: flex-start;
            }

            .form-group.flex-container {
                flex-direction: column;
                gap: 10px;
            }

            .form-group.flex-container .input-inline {
                width: 100%;
            }

            .form-group.flex-container .form-group:last-child {
                width: 100%;
            }

            .buttons {
                flex-direction: column;
                gap: 10px;
            }
        }

        /* Media Query untuk Mobile */
        @media (max-width: 480px) {
            body {
                padding: 5px;
                justify-content: center;
                align-items: center;
            }

            .payment-container {
                width: 100%;
                max-width: 100%;
                padding: 10px;
            }

            h2 {
                font-size: 1rem;
            }

            .plan-box {
                flex-direction: column;
                align-items: flex-start;
                padding: 5px;
            }

            .plan-price .amount {
                font-size: 1rem;
            }

            .payment-method {
                width: 100%;
            }

            .payment-box {
                align-items: flex-start;
            }

            .form-group.flex-container {
                flex-direction: column;
                gap: 5px;
            }

            .form-group.flex-container .input-inline {
                width: 100%;
            }

            .form-group.flex-container .form-group:last-child {
                width: 100%;
            }

            .buttons {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="payment-container">
        <div class="payment-box">
            <h2>PAYMENT</h2>
            <p>Please make the payment to start enjoying all the features of our premium plan as soon as possible</p>
            <div id="card2" class="payment-container2">
                <div class="payment-method2">
                    <form action="/payment-api" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="card-number" onclick="toggleToCard1()">NAME</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="card-number" onclick="toggleToCard1()">TOTAL PAYMENT</label>
                            <input type="text" id="total_price" name="total_price" required>
                        </div>
                        <button class="payment-button" id="button">BAYAR</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
