<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Durian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 20px;
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4 text-center">Agen Durian Unggul</h1>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('assets/img/durian.jpg')}}" class="card-img-top" alt="Durian">
                    <div class="card-body">
                        <h5 class="card-title">Durian Lokal</h5>
                        <p class="card-text">Durian lokal, rasanya manis dan ada pait-paitnya, dijamin wueeeenak.</p>
                        <form id="orderForm" action="/checkout" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="qty" class="form-label">Mau Pesan Berapa?</label>
                                <input type="number" name="qty" class="form-control" id="qty"
                                    placeholder="jumlah yang dipesan" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Pelanggan</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="masukan nama anda!" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">No Telp</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    placeholder="masukan no hp!" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea name="address" class="form-control" id="address" rows="3" required></textarea>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#confirmationModal">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <li id="confirmQty"></li>
                        <li id="confirmName"></li>
                        <li id="confirmPhone"></li>
                        <li id="confirmAddress"></li>
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
    <script>
        document.querySelector('[data-bs-target="#confirmationModal"]').addEventListener('click', function () {
            document.getElementById('confirmQty').innerText = 'Jumlah: ' + document.getElementById('qty').value;
            document.getElementById('confirmName').innerText = 'Nama: ' + document.getElementById('name').value;
            document.getElementById('confirmPhone').innerText = 'No Telp: ' + document.getElementById('phone').value;
            document.getElementById('confirmAddress').innerText = 'Alamat: ' + document.getElementById('address').value;
        });

        document.getElementById('confirmButton').addEventListener('click', function () {
            document.getElementById('orderForm').submit();
        });
    </script>
</body>

</html>
