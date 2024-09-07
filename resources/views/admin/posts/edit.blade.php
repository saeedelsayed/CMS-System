<x-admin-master>

    @section('content')

        <h1>Edit a post</h1>

        <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" aria-describedby="" placeholder="enter title" value="{{$post->title}}"><br><br>
            </div>

            <div class="form-group">
                <div><img height="100px" src="{{$post->post_image}}" alt=""></div>
                <label for="file">File</label>
                <input type="file" id="post_image" name="post_image" class="form-control-file"><br><br>
            </div>

            <div class="form-group">
                <textarea name="body" class="form-group" id="body" cols="120" rows="10">{{$post->body}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection

</x-admin-master>
