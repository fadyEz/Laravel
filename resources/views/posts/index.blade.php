
<x-app-layout>
    
    <!-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">📋 All Posts</h2>
        <a href="/posts/create" class="btn btn-success">➕ Add Post</a>
    </div> -->

    <div class="table-responsive">
        <table class="table table-dark table-hover table-bordered align-middle">
            <thead>
                <tr class="table-active text-center">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created By</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr class="text-center">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->user->name ?? $post->create_by }}</td>
                        <td>
                            <a href="/posts/{{ $post->id }}" class="btn btn-info btn-sm">View</a>
                        </td>
                        <td>
                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <form action="/posts/{{ $post->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this post?')"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
</x-app-layout>
