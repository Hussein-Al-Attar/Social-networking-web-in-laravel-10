<x-app-layout>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            @if (Auth::user()->profile_photo_path)
                                <img src="{{ url('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Photo"
                                    class="img-fluid rounded-circle m-auto" style="width: 150px; height: 150px;">
                            @elseif (Auth::user()->image_url_google)
                                <img src="{{ Auth::user()->image_url_google }}" alt="Profile Photo"
                                    class="img-fluid rounded-circle m-auto" style="width: 150px; height: 150px;">
                            @else
                                <span class="material-symbols-outlined"> account_circle </span>
                            @endif
                            <h5 class="my-3">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-1">Full Stack Developer</p>
                            <p class="text-muted mb-4">{{ Auth::user()->address }}</p>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2 row"
                                style="background-color: #efefef;">
                                <div class="col">
                                    <p class="small text-muted mb-1">Articles</p>
                                    <p class="mb-0">41</p>
                                </div>
                                <div class="px-3 col">
                                    <p class="small text-muted mb-1">Followers</p>
                                    <p class="mb-0">976</p>
                                </div>
                                <div class="col">
                                    <p class="small text-muted mb-1">Rating</p>
                                    <p class="mb-0">8.5</p>
                                </div>
                                <div class="col d-flex align-items-center justify-content-center">
                                    <a href="{{ route('profile.show') }}">
                                        <span class="material-symbols-outlined"> settings </span>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('users.follow', Auth::user()) }}" method="POST">
                                        @csrf
                                        <button type="button">
                                            <span
                                                class="material-symbols-outlined d-flex align-items-center justify-content-center">
                                                person_add
                                            </span>
                                        </button>
                                    </form>
                                </div>
                                <div class="col"><button type="button">
                                        <span
                                            class="material-symbols-outlined d-flex align-items-center justify-content-center">
                                            chat
                                        </span></button>

                                </div>
                                <div class="col"><a href="{{ route('user.edit', Auth::user()->id) }}"><button
                                            type="button"><span
                                                class="material-symbols-outlined d-flex align-items-center justify-content-center">
                                                edit
                                            </span></button></a>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">discription</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->discription }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container bg-white shadow rounded-sm h-25">

                <div class="row text-center ">
                    <div class="col d-flex align-items-center justify-content-center" style="height: 60px">
                        <a href="{{ route('posts.create') }}"> <span class="material-symbols-outlined">
                                post_add
                            </span></a>

                    </div>
                    <div class="col d-flex align-items-center justify-content-center btn-primary">
                        <span class="material-symbols-outlined ">
                            library_books
                        </span>
                    </div>
                </div>

            </div>

            <x-post :posts="$posts" />
    </section>

</x-app-layout>
