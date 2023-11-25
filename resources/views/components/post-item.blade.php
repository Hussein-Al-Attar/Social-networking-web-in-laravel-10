<div class="grid-item">
    <img src="{{ url('storage/'.$post->image_url) }}" alt="Post 1" />
    <h1>{{ $post->title }}</h1>
    <p>
        {{ $post->content }}
    </p>
</div>
