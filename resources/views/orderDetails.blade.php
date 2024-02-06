<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-color:#646664">
    <div class="container" >
        @include('menu')
        <h3>Order #{{ $orderId }} </h3>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th> 
                        <th scope="col">Quantity</th>
                        <th scope="col">Price for one</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $counter = 1;
                @endphp
                    @foreach ($orderDetails as $item)
                        <tr>
                            <th scope="row">{{ $counter }}</th>
                            <td>{{ $item['product'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['priceForOne'] }}</td>
                        </tr>
                        @php
                            $counter++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>