<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit post</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route("posts.update",$post->id)}}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Enter post title" value="{{$post->title}}" name="title">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Post Text</label>
                            <textarea id="summernote" rows="7" class="form-control" name="text">{{$post->text}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Topics:</label>
                        </div>
                        <div class="row">
                            @foreach($topics as $t)
                                <div class="col-md-3">
                                    <label>{{$t->name}}</label>
                                    <input type="checkbox" value="{{$t->id}}" name="topics[]" @if(in_array($t->id,$post->postTopicId)) checked @endif >
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <input type="hidden" id="userId" name="user" value="@if(session()->has("user")){{session("user")->id}}@endif">
                <div id="feedback">
                    <ul>
                        @isset($errors)
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
                <button type="submit" class="btn btn-info btn-fill pull-right" name="btnInsertService">Edit post</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>




@if(session()->has("editPostError"))
    <script>
        window.onload = function () {
            demo.showNotification('top','right',4,'{{session("editPostError")}}')
        }
    </script>
@endif

@if(session()->has("editPostSuccess"))
    <script>
        window.onload = function () {
            demo.showNotification('top','right',2,'{{session("editPostSuccess")}}')
        }
    </script>
@endif
@if($errors->all())
    <script>
        window.onload = function () {
            demo.showNotification('top','right',4,'Error on updating post!')
        }
    </script>
@endif
