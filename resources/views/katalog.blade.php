<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Katalog Kopi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1512820790803-83ca734da794');
            background-size: cover;
            background-attachment: fixed;
        }

        .container-fluid {
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        .social-icons {
            margin-top: 40px;
            text-align: center;
        }

        .social-icons img {
            width: 40px;
            margin: 0 10px;
            transition: transform 0.3s;
        }

        .social-icons img:hover {
            transform: scale(1.2);
        }

        /* Tambahan gaya untuk judul */
        h1 {
            font-family: 'Georgia', serif;
            font-size: 3em;
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 10px;
        }

        .is-invalid {
            border-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="my-4">Katalog Kopi</h1>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="assets/img/kopi-arabika.jpg" class="card-img-top" alt="Kopi 1">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Arabika</h5>
                                <p class="card-text">Kopi dengan aroma dan rasa yang kuat, cocok untuk pecinta kopi
                                    sejati.</p>
                                <p class="card-text"><strong>Rp5,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Arabika"
                                    data-price="5000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="assets/img/kopi-robusta.jpg" class="card-img-top" alt="Kopi 2">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Robusta</h5>
                                <p class="card-text">Kopi dengan rasa pahit yang khas, cocok untuk pagi hari.</p>
                                <p class="card-text"><strong>Rp4,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Robusta"
                                    data-price="4000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="assets/img/kopi-luwak.jpg" class="card-img-top" alt="Kopi 3">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Luwak</h5>
                                <p class="card-text">Kopi eksklusif dengan proses yang unik, menghasilkan rasa yang luar
                                    biasa.</p>
                                <p class="card-text"><strong>Rp20,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Luwak" data-price="20000">Add
                                    to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="assets/img/kopi-toraja.jpg" class="card-img-top" alt="Kopi 4">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Toraja</h5>
                                <p class="card-text">Kopi dengan aroma dan rasa yang khas dari daerah Toraja.</p>
                                <p class="card-text"><strong>Rp7,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Toraja" data-price="7000">Add
                                    to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="assets/img/kopi-gayo.jpg" class="card-img-top" alt="Kopi 5">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Gayo</h5>
                                <p class="card-text">Kopi dengan rasa dan aroma yang khas dari Aceh Gayo.</p>
                                <p class="card-text"><strong>Rp60,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Gayo" data-price="60000">Add
                                    to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="assets/img/kopi-bali-kintamani.jpg" class="card-img-top" alt="Kopi 6">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Bali Kintamani</h5>
                                <p class="card-text">Kopi dengan rasa unik dari daerah Kintamani, Bali.</p>
                                <p class="card-text"><strong>Rp65,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Bali Kintamani"
                                    data-price="65000">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="assets/img/kopi-papua.jpg" class="card-img-top" alt="Kopi 7">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Papua</h5>
                                <p class="card-text">Kopi dengan aroma dan rasa yang khas dari Papua.</p>
                                <p class="card-text"><strong>Rp55,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Papua" data-price="55000">Add
                                    to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="assets/img/kopi-flores.jpg" class="card-img-top" alt="Kopi 8">
                            <div class="card-body">
                                <h5 class="card-title">Kopi Flores</h5>
                                <p class="card-text">Kopi dengan aroma dan rasa yang khas dari Flores.</p>
                                <p class="card-text"><strong>Rp75,000</strong></p>
                                <button class="btn btn-primary addToCart" data-name="Kopi Flores"
                                    data-price="75000">Add
                                    to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cart">
                    <h4>Keranjang Belanja</h4>
                    <form id="orderForm" action="/checkout" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Masukkan nama anda!" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">No Telp</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="Masukkan no hp!" required>
                        </div>
                        <input type="text" name="total_price" class="form-control" id="total_price"
                            placeholder="Masukkan Jumlah Pembayaran!" hidden>

                        <div id="cartItems"></div>
                        <hr>
                        <p>Total: <span class="totalPrice">Rp0</span></p>
                        <button type="button" id="checkoutButton" class="btn btn-success" disabled>Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="m-2">
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank"><img
                    src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"
                    alt="Facebook"></a>
            <a href="https://www.instagram.com" target="_blank"><img
                    src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram"></a>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Your Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin dengan pesanan anda?</p>
                    <ul>
                        {{-- <li id="confirmQty"></li> --}}
                        <li id="confirmName"></li>
                        <li id="confirmPhone"></li>
                        {{-- <li id="confirmAddress"></li> --}}
                        <li id="confirmTotalPrice"></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmButton">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var cart = [];
            var totalPrice = 0;

            $('.addToCart').click(function() {
                var itemName = $(this).data('name');
                var itemPrice = $(this).data('price');

                cart.push({
                    name: itemName,
                    price: itemPrice
                });
                updateCart();
            });

            function updateCart() {
                $('#cartItems').empty();
                totalPrice = 0;

                cart.forEach(function(item, index) {
                    $('#cartItems').append('<div class="cart-item">' +
                        '<span>' + item.name + ' - Rp' + item.price + '</span>' +
                        '<span class="remove-item" data-index="' + index + '">Remove</span>' +
                        '</div>');

                    totalPrice += item.price;
                });

                $('.totalPrice').text('Rp' + totalPrice);
                $('#total_price').val(totalPrice);

                // Enable/disable checkout button based on cart contents
                if (cart.length > 0) {
                    $('#checkoutButton').prop('disabled', false);
                } else {
                    $('#checkoutButton').prop('disabled', true);
                }
            }

            $(document).on('click', '.remove-item', function() {
                var index = $(this).data('index');
                cart.splice(index, 1);
                updateCart();
            });

            // $('#checkoutButton').click(function () {
            //     // Add your checkout logic here
            //     alert('Thank you for your purchase!');
            //     cart = [];
            //     updateCart();
            // });
        });

        document.getElementById('checkoutButton').addEventListener('click', function() {
            let isValid = true;

            // Validate each input field
            const fields = ['name', 'phone'];
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
                document.getElementById('confirmName').innerText = 'Nama: ' + document.getElementById('name').value;
                document.getElementById('confirmPhone').innerText = 'No Telp: ' + document.getElementById('phone')
                    .value;
                // document.getElementById('confirmAddress').innerText = 'Alamat: ' + document.getElementById('address').value;
                document.getElementById('confirmTotalPrice').innerText = 'Jumlah Pembayaran: ' + document
                    .getElementById('total_price').value;

                // Show the modal
                const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                confirmationModal.show();
            } else {
                alert('Please fill in all fields');
            }
        });

        document.getElementById('confirmButton').addEventListener('click', function() {
            document.getElementById('orderForm').submit();
        });
    </script>
</body>

</html>
