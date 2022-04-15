<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Create New Slide</div>
                            <div class="col-md-offset-2  col-md-4">
                                <a href="{{route('admin.HomeSlider')}}" class="btn btn-info">All Slides</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="updateSlide">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">title</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="title" placeholder="title" >
                                    @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="subtitle" placeholder="subtitle" >
                                    @error('subtitle')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">link</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="link" placeholder="link" >
                                    @error('link')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">image</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" wire:model="new_image" placeholder="image" >

                                    @if($new_image)
                                        <img src="{{$new_image->temporaryUrl()}}" width="70" height="60" alt="">
                                    @endif
                                    <img width="70" height="60" src="{{asset('assets/images/'.$image)}}" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">price</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" wire:model="price" placeholder="price" >
                                    @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">status</label>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-control" wire:model="status" placeholder="status" >
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
