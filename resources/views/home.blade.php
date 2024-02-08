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
        <div class="products-container mt-2">
            <div class="d-flex align-content-stretch flex-wrap" style="justify-content:start; align-items:center;">

            @foreach ($products as $product)
                @if($product->stockBalance <= 0) 
                    @continue
                @endif
                <div href='productCard?id={{ $product->id }}' class="card text-white bg-dark m-3" style="max-width: 18rem;">
                    <div class="card-header">
                        <a href='product_card?id={{ $product->id }}'>
                            <img src="/img/{{ $product->title }}.png" alt="pic" class="img-thumbnail">
                        </a> 
                    </div>
                    <div class="card-body">
                        <h5 style="text-align:center;" class="card-title">
                            <a style="text-transform: uppercase;" href='product?id={{ $product->id }}'>
                                {{ $product->title }}
                            </a> 
                        </h5>
                        <p>{{ $product->description }}</p>
                        <p>Price: {{ $product->price }}</p>
                    </div>
                    <div style="display:flex; justify-content: space-between; padding: 1em">
                        <a href="/addCart?id={{ $product->id }}">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Add at cart</button>
                        </a>
                        <div>
                            <p>Stock: <span> {{ $product->stockBalance }} </span></p>
                        </div>
                    </div>
                    
                </div> 
            @endforeach
                  
                
            </div>
        </div>

    </div>
</body>
</html>