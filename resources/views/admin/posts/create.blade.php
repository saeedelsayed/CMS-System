<x-admin-master>

    @section('content')

        <h1>Create</h1>

        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" aria-describedby="" placeholder="enter title"><br><br>
            </div>

            <div class="form-group">
                <label for="file">File</label>
                <input type="file" id="post_image" name="post_image" class="form-control-file"><br><br>
            </div>

            <div class="form-group">
                <textarea name="body" class="form-group" id="body" cols="120" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection

</x-admin-master>
