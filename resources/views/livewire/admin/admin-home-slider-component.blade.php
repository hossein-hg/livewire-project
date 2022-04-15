<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">All Slides</div>
                            <div class="col-md-offset-3 col-md-3 ">
                                <a href="{{route('admin.HomeSlider.add')}}" class="btn btn-info">Create New Slide</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Link</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($homeSlides as $slide)
                                <tr>
                                    <td>{{$slide->id}}</td>
                                    <td>{{$slide->title}}</td>
                                    <td>{{$slide->subtitle}}</td>
                                    <td>{{$slide->link}}</td>
                                    <td><img width="70" height="60" src="{{asset('assets/images/'.$slide->image)}}" alt=""></td>
                                    <td>
                                        <a href="{{route('admin.HomeSlider.edit',[$slide->id])}}"><i class="fa fa-edit text-info"></i></a>
                                        <a href="#" wire:click.prevent="delete({{$slide->id}})"><i class="fa fa-trash text-danger"></i></a>
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
