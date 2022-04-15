<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Create New Product</div>
                            <div class="col-md-offset-2  col-md-4">
                                <a href="{{route('admin.products')}}" class="btn btn-info">All Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="editProduct">
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
                                <label for="" class="col-md-4 control-label">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" wire:model="regular_price" placeholder="Regular Price">
                                    @error('regular_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Sale Price</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" wire:model="sale_price" placeholder="Sale Price">
                                    @error('sale_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" wire:model="quantity" placeholder="Quantity">
                                    @error('quantity')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" wire:model="new_image" placeholder="Sale Price">
                                    @if($new_image)
                                        <img src="{{$new_image->temporaryUrl()}}" width="70" height="60" alt="">
                                    @endif
                                    <img src="{{asset('assets/images/products/'.$image)}}" width="70" height="60" alt="">
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Short Description </label>
                                <div class="col-md-4">
                                    <textarea class="form-control" wire:model="short_description"></textarea>
                                    @error('short_description')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"> Description </label>
                                <div class="col-md-4">
                                    <textarea class="form-control" wire:model="description"></textarea>
                                    @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"> Featured </label>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-control" wire:model="featured">
                                    @error('featured')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"> Stock Status </label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="inStock">in Stock</option>
                                        <option value="outOfStock">out Of Stock</option>
                                    </select>
                                    @error('stock_status')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"> Category </label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select.....</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
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
