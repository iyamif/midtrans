<head>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script>
  </head>

  <body>
    <p>Input snap token retrieved from step 1 (Backend), then click Pay.</p>
      <p>{{$snapToken}}</p>
    <form onsubmit="return false">
      <label for="snapToken">Snap Token:</label>
      <input type="text" id="snap-token">
      <button id="pay-button">Pay!</button>
    </form>

    <script type="text/javascript">
      var payButton = document.getElementById('pay-button');
      // For example trigger on button clicked, or any time you need
      payButton.addEventListener('click', function() {
        var snapToken = document.getElementById('snap-token').value;
        snap.pay(snapToken);
      });

    </script>
  </body>

</html>
