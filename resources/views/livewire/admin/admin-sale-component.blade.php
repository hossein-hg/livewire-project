<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">On Sale</div>
                            <div class="col-md-offset-2  col-md-4">

                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="update">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Sale Date</label>
                                <div class="col-md-4">
                                    <input id="sale-date" type="text" class="form-control" wire:model="sale_date" placeholder="Sale Date" >
                                    @error('sale_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select name="" id="" wire:model="status" class="form-control">
                                        <option value="0">inactive</option>
                                        <option value="1">active</option>
                                    </select>
                                    @error('status')
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
            $('#sale-date').datetimepicker({
                format : 'Y-MM-DD h:m:s',
            })
                .on('dp.change',function (ev){
                    let data = $('#sale-date').val();
                @this.set('sale_date',data);
                })
        })
    </script>
@endsection
