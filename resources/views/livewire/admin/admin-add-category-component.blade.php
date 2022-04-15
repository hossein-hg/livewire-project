<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Create New Category</div>
                            <div class="col-md-offset-2  col-md-4">
                                <a href="{{route('admin.categories')}}" class="btn btn-info">All Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="addCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="name" placeholder="Category Name" wire:keyup="generateSlug">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="slug" placeholder="Category Slug">
                                    @error('slug')
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
