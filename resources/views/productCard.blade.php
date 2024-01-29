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
            <div style="max-width: 18rem;">
                <img src="/img/{{ $product->title }}.png" alt="pic" class="img-thumbnail">
            </div>
            <div >
                <ul>
                    <li>
                        <h1>{{ $product->title }}</h1>
                    </li>
                    <li>
                        <p>{{ $product->description }}</p>
                    </li>
                    <li>
                        <p>{{ $product->price }}</p>
                    </li>
                </ul>
            </div>
            
            <br><br>
            <p style="display:inline-block">Add to cart</p><br>
            <a href="/addCart?id={{ $product->id }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Add at cart</button>
            </a>
                  
                
            </div>
        </div>

    </div>
</body>
</html>