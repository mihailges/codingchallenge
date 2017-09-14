<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products</title>    

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
          <h2>Products</h2>    
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Promotions</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             @foreach($products as $product)
             
                  <tr>
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->promotion_text }}</td>
                    <td>
                        <form action="{{ route('add-product-cart') }}" method="post">
                            <input type="hidden" value="{{ $product->product_id }}" name="product_id"/>
                            <input type="hidden" value="{{ $product->name }}" name="product_name"/>
                            <input type="hidden" value="{{ $product->price }}" name="product_price"/>
                            <input type="hidden" value="1" name="product_qty"/>
                            <input type="hidden" value="{{ $product->promotion_id }}" name="product_promotion"/>
                            <button type="submit" class="btn btn-default">Add to cart</button>
                        </form>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          <p>{{ Session::get('message') }}</p>
          <a href="{{ route('cart') }}">My shopping cart</a>
        </div>
    </body>
</html>
