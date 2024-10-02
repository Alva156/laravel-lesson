<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Post added successfully</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            All Post
                        </div>

                        <div class="card-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1?>
                                    @foreach ( $posts as $post )
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->content}}</td>
                                        <td>{{$post->user->email}}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{$post->created_at->diffForHumans( )}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Post
                        </div>
                        <div class="card-body">
                            <form action="{{route('create-post')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Content</label>
                                    <input type="text" class="form-control @error('content') is-invalid @enderror"
                                        id="content" name="content" value="{{ old('content') }}">
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary"> Add Post</button>
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>
</x-app-layout>