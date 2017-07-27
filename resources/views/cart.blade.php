<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Shopping Cart</title>    

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
          <h2>My Shopping Cart</h2> 
          @if(count($cart) > 0)   
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Qty</th>
              </tr>
            </thead>
            <tbody>
             @foreach($cart as $item)
                <tr>
                  <td>{{ $item['product_name'] }}</td>
                  <td> ${{ $item['product_price'] }}</td>
                  <td>{{ $item['qty'] }}</td>
                </tr>
              @endforeach
                <tr>
                  <td></td>
                  <td><b>${{ $totalPrice }}</b></td>
                  <td><b>{{ $totalProducts }}</b></td>
                </tr>
            </tbody>
          </table>
          <a href="{{ route('empty-cart') }}">Destroy Cart</a>
          @else
          <p>Your shopping cart is empty.</p>
          @endif
          <p>{{ Session::get('message') }}</p>
          <a href="{{ route('products') }}">Back to Products</a>
        </div>
    </body>
</html>
