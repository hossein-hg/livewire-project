<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">All Coupons</div>
                            <div class="col-md-offset-3 col-md-3 ">
                                <a href="{{route('admin.coupon.add')}}" class="btn btn-info">Create New Coupon</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>Cart Value</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->type}}</td>
                                    <td>{{$coupon->value}}</td>
                                    <td>{{$coupon->cart_value}}</td>
                                    <td>
                                        <a href="{{route('admin.coupon.edit',[$coupon->id])}}"><i class="fa fa-edit text-info"></i></a>
                                        <a href="#" wire:click.prevent="delete({{$coupon->id}})"><i class="fa fa-trash text-danger"></i></a>
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
