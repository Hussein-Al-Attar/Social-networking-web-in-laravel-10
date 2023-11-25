<div class="row">
    @foreach ($comments as $comment)
    <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
            {{-- <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image Description"> --}}
            @if ($comment->user->profile_photo_path)
                <img src="{{ url('storage/' . $comment->user->profile_photo_path) }}" alt="Profile Photo"
                class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" style="width: 50px; height: 50px;">
            @elseif ($comment->user->image_url_google)
                <img src="{{ $comment->user->image_url_google }}" alt="Profile Photo"
                class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" style="width: 50px; height: 50px;">
            @else
                <span class="material-symbols-outlined"> account_circle </span>
            @endif
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                <div class="g-mb-15">
                    <h5 class="h5 g-color-gray-dark-v1 mb-0">{{ $comment->user->name }}</h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12">{{ $comment->created_at->diffForHumans() }}</span>
                </div>

                <p>{{ $comment->body }}</p>

                <ul class="list-inline d-sm-flex my-0">
                    <li class="list-inline-item g-mr-20">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                            178
                        </a>
                    </li>
                    <li class="list-inline-item g-mr-20">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                            34
                        </a>
                    </li>
                    <li class="list-inline-item ml-auto">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                            Reply
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach


</div>
