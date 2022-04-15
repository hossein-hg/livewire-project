<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">All Products</div>
                            <div class="col-md-offset-3 col-md-3 ">
                                <a href="{{route('admin.product.add')}}" class="btn btn-info">Create New Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Regular Price</th>
                                <th>image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td>{{$product->regular_price}}</td>
                                    <td><img src="{{asset('assets/images/products/'.$product->image)}}" width="70" height="60" alt=""></td>
                                    <td>
                                        <a href="{{route('admin.product.edit',[$product->slug])}}"><i class="fa fa-edit text-info"></i></a>
                                        <a href="#" wire:click.prevent="delete({{$product->id}})"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
