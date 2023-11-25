@foreach ($posts as $post)
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">

                <div class="row">
                    <div class="col">
                        @if ($post->user->profile_photo_path)
                            <img src="{{ url('storage/' . $post->user->profile_photo_path) }}" alt="Profile Photo"
                                class="rounded-circle mr-2" style="width: 40px;height: 40px;">
                        @elseif ($post->user->image_url_google)
                            <img src="{{ $post->user->image_url_google }}" alt="Profile Photo"
                                class="rounded-circle mr-2" style="width: 40px;height: 40px;">
                        @else
                            <span class="material-symbols-outlined"> account_circle </span>
                        @endif
                    </div>
                    <div class="col text-right">
                        <div class="row">
                            <div class="col"> <span class="font-weight-bold">{{ $post->user->name }}</span>
                            </div>
                            <div class="col">

                                <div class="dropdown">
                                    <button class="dropbtn"><span class="material-symbols-outlined">
                                            more_vert
                                        </span></button>
                                    <div class="dropdown-content">
                                        <a href="#">Link 1</a>
                                        <a href="#">Link 2</a>
                                        <a href="#">Link 3</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ url('storage/' . $post->image_url) }}" alt="Post Image" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <p>
                    <strong>Tags:</strong>
                    @foreach ($post->tags as $tag)
                        <span class="badge badge-primary">{{ $tag->name }}</span>
                    @endforeach
                </p>
                <hr>
                <div class="row">
                    <div class="col text-center"><a href="#"><span class="material-symbols-outlined">
                                favorite </span></a></div>
                    <div class="col text-center"> <a href="{{ route('comments.show', $post->id) }}"><span
                                class="material-symbols-outlined">
                                comment
                            </span></a> </div>
                    <div class="col text-center"> <a href="#"><span class="material-symbols-outlined">
                                share
                            </span></a></div>
                </div>
            </div>
            <div class="card-footer">
                <small class="text-muted">Posted {{ $post->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
@endforeach
