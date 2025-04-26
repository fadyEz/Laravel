

<x-app-layout>
    <x-slot:title>
        Post Details
    </x-slot:title>
    <div class="container mt-5">
        <h2 class="mb-4">Post Details</h2>
        <form action="/posts/{{ $post->id }}" method="POST">
       
        @method('put')
        @csrf
            <div class="mb-3">
                <label for="Title" class="form-label">Title</label>
                <input type="text" class="form-control" id="Title" name="title" value="{{ $post['title'] }}">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input type="text" class="form-control" id="body" name="body"  value="{{ $post['body'] }}">
            </div>
            <div class="mb-3">
                <label for="create_by" class="form-label">Create By</label>
                <input type="text" class="form-control" id="create_by" name="create_by"  value="{{ $post->user->name  }}">
            </div>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    </x-app-layout>
