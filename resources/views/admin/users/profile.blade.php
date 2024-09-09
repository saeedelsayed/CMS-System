<x-admin-master>
    @section('content')
        <h1>User Profile for: {{$user->name}}</h1>

        <div class="row">

            <div class="col-sm 6">

                <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <img height="100px" width="100px" class="img-profile rounded-circle" src="{{$user->avatar}}" alt="">
                    </div>

                    <div class="form-group">
                        <input type="file" name="avatar">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"
                                name="username"
                               class="form-control"
                               id="username"
                               value="{{$user->username}}"
                        >
                        @error('username')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               id="Name"
                               value="{{$user->name}}"
                        >
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                               name="email"
                               class="form-control"
                               id="email"
                               value="{{$user->email}}"
                        >
                        @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               id="password"
                        >
                        @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                               id="password_confirmation"
                        >
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>

        </div>
    @endsection
</x-admin-master>
