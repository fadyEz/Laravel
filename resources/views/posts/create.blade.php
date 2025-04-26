<x-app-layout>
    <x-slot:title>
        Create Post 
    </x-slot:title>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2 class="mb-4 text-white text-center">
                    📝 <span class="text-warning">Create New Post</span>
                </h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card bg-light shadow border-0">
                    <div class="card-body">
                        <form action="/posts" method="POST">
                            @csrf

                            <div class="mb-3">
                            <label for="Title" class="form-label text-dark fw-bold">Title</label>
                            <input type="text" class="form-control" name="title" id="Title" value="{{ old('title') }}">
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label text-dark fw-bold">Body</label>
                                <input type="text" class="form-control" name="body" id="body" value="{{ old('body') }}">
                            </div>

                            <div class="mb-3">
                                <label for="create_by" class="form-label text-dark fw-bold">Created By</label>
                                <input type="text" class="form-control" name="create_by" id="create_by" value="{{ old('create_by') }}">
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="/posts" class="btn btn-secondary">← Back</a>
                                <button type="submit" class="btn btn-success">➕ Add Post</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
