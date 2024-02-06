<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/cart-btn.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-color:#646664">
    <div class="container" >
        @include('menu')
        <h1 style="text-align:center">CART</h1>


        

        <section class="h-100" style="background-color: #eee;">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    </div>
                    @if($cartItems)
                        <ul>
                    @foreach($cartItems as $productId => $item)
                    <li>
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img
                                    src="/img/{{ $item['title'] }}.png" 
                                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">{{ $item['title'] }}</p>
                                    <p>{{ $item['description'] }}</p>
                                </div>
                                <div class="qty mt-5">
                                    <a href="/editQuantity?item={{ $productId }}&action=minus"><span class="minus bg-dark">-</span></a>

                                    <input type="number" class="count" name="qty" value="{{ $item['quantity'] }}">

                                    <a href="/editQuantity?item={{ $productId }}&action=plus"><span class="plus bg-dark">+</span></a>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0">{{ $item['price'] }} <span>rub</span></h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="/cartElemDel?id={{ $productId }}" style="color: #cecece;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                        </ul>
                    @else
                        <p>The basket is empty</p>
                    @endif

                    <div class="card">
                        <p>Total:</p>
                        <h5>{{ $total }} <span>rub</span></h5>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <a href="/order" type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</a>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>