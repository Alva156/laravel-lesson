<x-app-layout>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
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
                <td>{{$post->descrip}}</td>
                <td>{{$post->user_id}}</td>
                <td>{{$post->created_at->diffForHumans( )}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>