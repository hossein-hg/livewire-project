<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">All Orders</div>
                            <div class="col-md-offset-3 col-md-3 ">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>subtotal</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>FirstName</th>
                                <th>lastName</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>Details</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->subtotal}}</td>
                                    <td>{{$order->discount}}</td>
                                    <td>{{$order->tax}}</td>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->firstName}}</td>
                                    <td>{{$order->lastName}}</td>
                                    <td>{{$order->mobile}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td><a href="{{route('admin.orderDetails',[$order->id])}}" class="btn btn-info">Details</a></td>
                                    <td>
                                        <div class="dropdown">
                                            <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle"  >
                                                Status <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')" href="#">Delivered</a></li>
                                                <li><a wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')" href="#">Canceled</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
