<x-app-layout>
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <p>
            <strong>Tags:</strong>
            @foreach ($post->tags as $tag)
                <span class="badge badge-primary">{{ $tag->name }}</span>
            @endforeach
        </p>
        @if ($post->image_url)
            <img src="{{ url('storage/' . $post->image_url) }}" alt="Post Image" class="img-fluid mb-3">
        @endif
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="body">Comment:</label>
                <textarea class="form-control" name="body" id="body" rows="3"></textarea>
            </div>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
        <h2>Comments</h2>
        <x-comments :comments="$post->comments" />

        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
    </div>
</x-app-layout>
