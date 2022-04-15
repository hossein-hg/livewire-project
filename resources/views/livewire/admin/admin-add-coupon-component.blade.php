<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Create New Coupon</div>
                            <div class="col-md-offset-2  col-md-4">
                                <a href="{{route('admin.coupons')}}" class="btn btn-info">All Coupons</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="addCoupon">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Code</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="code" placeholder="Category Code" >
                                    @error('code')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Type</label>
                                <div class="col-md-4">

                                    <select name="" class="form-control" wire:model="type" id="">
                                        <option value="percent">percent</option>
                                        <option value="fixed">fixed</option>
                                    </select>
                                    @error('type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Value</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="value" placeholder="Coupon value" >
                                    @error('value')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Cart Value</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="cart_value" placeholder="Cart value" >
                                    @error('cart_value')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Expiry Time</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="expiry_date"  id="expiry_date">
                                    @error('expiry_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        $(function (){
            $('#expiry_date').datetimepicker({
                format : 'Y-MM-DD h:m:s',
            })
                .on('dp.change',function (ev){
                    let data = $('#expiry_date').val();
                @this.set('expiry_date',data);
                })
        })
    </script>
@endsection
