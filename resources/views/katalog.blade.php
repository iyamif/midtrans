<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Katalog Kopi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container-fluid {
            padding: 20px;
        }

        .card {
            margin-top: 20px;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            background: #fff;
            padding: 20px;
        }

        .addToCart {
            background-color: #6c757d;
            border: none;
        }

        .addToCart:hover {
            background-color: #5a6268;
        }

        .cart {
            position: sticky;
            top: 20px;
            background: #343a40;
            color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart h4 {
            border-bottom: 1px solid #fff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .cart-item span {
            color: #fff;
        }

        .remove-item {
            cursor: pointer;
            color: red;
        }

        .totalPrice {
            font-size: 1.5em;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="my-4 text-center">Katalog Kopi</h1>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 1">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Arabika</h5>
                                <p class="card-text">Kopi dengan aroma dan rasa yang kuat, cocok untuk pecinta kopi sejati.</p>
                                <p class="card-text"><strong>Rp50,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Arabika" data-price="50000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 2">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Robusta</h5>
                                <p class="card-text">Kopi dengan rasa pahit yang khas, cocok untuk pagi hari.</p>
                                <p class="card-text"><strong>Rp40,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Robusta" data-price="40000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 3">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Luwak</h5>
                                <p class="card-text">Kopi eksklusif dengan proses yang unik, menghasilkan rasa yang luar biasa.</p>
                                <p class="card-text"><strong>Rp200,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Luwak" data-price="200000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 4">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Toraja</h5>
                                <p class="card-text">Kopi dengan aroma dan rasa yang khas dari daerah Toraja.</p>
                                <p class="card-text"><strong>Rp70,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Toraja" data-price="70000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 5">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Gayo</h5>
                                <p class="card-text">Kopi dengan rasa dan aroma yang khas dari Aceh Gayo.</p>
                                <p class="card-text"><strong>Rp60,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Gayo" data-price="60000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 6">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Bali Kintamani</h5>
                                <p class="card-text">Kopi dengan rasa unik dari daerah Kintamani, Bali.</p>
                                <p class="card-text"><strong>Rp65,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Bali Kintamani" data-price="65000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 7">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Papua</h5>
                                <p class="card-text">Kopi dengan rasa dan aroma khas dari Papua.</p>
                                <p class="card-text"><strong>Rp55,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Papua" data-price="55000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 8">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Sumatra</h5>
                                <p class="card-text">Kopi dengan rasa dan aroma yang kuat dari Sumatra.</p>
                                <p class="card-text"><strong>Rp50,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Sumatra" data-price="50000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 9">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Flores</h5>
                                <p class="card-text">Kopi dengan rasa khas dari daerah Flores.</p>
                                <p class="card-text"><strong>Rp70,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Flores" data-price="70000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 10">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Jawa</h5>
                                <p class="card-text">Kopi dengan rasa dan aroma khas dari Jawa.</p>
                                <p class="card-text"><strong>Rp45,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Jawa" data-price="45000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 11">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Sulawesi</h5>
                                <p class="card-text">Kopi dengan rasa dan aroma khas dari Sulawesi.</p>
                                <p class="card-text"><strong>Rp60,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Sulawesi" data-price="60000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Kopi 12">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Lampung</h5>
                                <p class="card-text">Kopi dengan rasa dan aroma khas dari Lampung.</p>
                                <p class="card-text"><strong>Rp50,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Lampung" data-price="50000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cart">
                    <h4>Keranjang Belanja</h4>
                    <div id="cartItems"></div>
                    <hr>
                    <h5>Total: <span id="totalPrice">Rp0</span></h5>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            let cart = [];
            let totalPrice = 0;

            $('.addToCart').on('click', function () {
                const itemName = $(this).data('name');
                const itemPrice = parseInt($(this).data('price'));

                cart.push({ name: itemName, price: itemPrice });
                totalPrice += itemPrice;

                updateCart();
            });

            $(document).on('click', '.remove-item', function () {
                const index = $(this).data('index');
                totalPrice -= cart[index].price;
                cart.splice(index, 1);

                updateCart();
            });

            function updateCart() {
                $('#cartItems').empty();
                cart.forEach((item, index) => {
                    $('#cartItems').append(
                        `<div class="cart-item">
                            <span>${item.name}</span>
                            <span>Rp${item.price.toLocaleString()}</span>
                            <span class="remove-item" data-index="${index}">&times;</span>
                        </div>`
                    );
                });
                $('#totalPrice').text(`Rp${totalPrice.toLocaleString()}`);
            }
        });
    </script>
</body>

</html>
