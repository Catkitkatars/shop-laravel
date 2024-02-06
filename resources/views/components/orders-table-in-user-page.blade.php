<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th> 
                <th scope="col">Order amount</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userOrders as $order)
                <tr>
                    <th scope="row">{{ $order['id'] }}</th>
                    <td>{{ $order['created_at'] }}</td>
                    <td>{{ $order['amount'] }}<span> rub</span></td>
                    <td>{{ $order['status'] }}</td>
                    <td>
                        <a href="/orderDetails?id={{ $order['id'] }}" class="btn btn-outline-success my-2 my-sm-0">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>