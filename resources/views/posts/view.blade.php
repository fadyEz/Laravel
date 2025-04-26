<x-app-layout>
    <x-slot:title>
        Post Details
    </x-slot:title>

    <div class="container py-5">
        <h2 class="text-dark text-center mb-4">📄 Post Details</h2>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center fw-bold">
                        📄 Post #{{ $post->id }}
                    </div>
                    <div class="card-body bg-light text-dark">
                        <p>
                            <label class="fw-bold text-dark">Title:</label> {{ $post->title }}
                        </p>
                        <p>
                            <label class="fw-bold text-dark">Body:</label> {{ $post->body }}
                        </p>
                        <p>
                            <label class="fw-bold text-dark">Created By:</label> {{ $post->user->name ?? $posts->create_by }}
                        </p>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="/posts" class="btn btn-secondary">← Back</a>
                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">✏️ Edit</a>
                            <form action="/posts/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">🗑️ Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
