<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Home Categories</div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="update">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Categories</label>
                                <div class="col-md-4" wire:ignore>
                                    <select  wire:model="cate_ideas" class="form-control" id="sel_categories" multiple="multiple" >
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">number of products</label>
                                <div class="col-md-4">
                                    <input wire:model="no_of_products" type="number" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-success">Update</button>
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
        $(document).ready(function (){
            $('#sel_categories').select2();
            $('#sel_categories').on('change',function (e){
                let data=$('#sel_categories').select2('val');
            @this.set('cate_ideas',data);
            })
        })
    </script>
@endsection
