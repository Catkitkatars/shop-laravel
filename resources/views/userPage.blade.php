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
            <h1>USER PAGE</h1>

            <ul>
                <li>Name: {{ $user->name }} </li>
                <li>Email: {{ $user->email }} </li>
                <li>Orders: __Quantity Orders__ 
                    <span>
                        <a class="btn btn-outline-success my-2 my-sm-0" href="/orders?{{ $user->id }}">Veiw orders</a>
                    </span>
                </li>
            </ul>
            <x-OrdersTableInUserPage /> 
    </div>
</body>
</html>