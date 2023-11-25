<x-app-layout>
    <div class="container">
        <h1>Search Results</h1>

        <p>Showing results for: {{ $query }}</p>

        <ul class="list-group">
            @forelse ($users->take(10) as $user)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            @if ($user->profile_photo_path)
                                <img src="{{ url('storage/' . $user->profile_photo_path) }}" alt="Profile Photo"
                                    class="img-fluid rounded-circle m-auto" style="width: 50px ;height: 50px;">
                            @elseif ($user->image_url_google)
                                <img src="{{ $user->image_url_google }}" alt="Profile Photo"
                                    class="img-fluid rounded-circle m-auto" style="width: 50px ;height: 50px;">
                            @else
                                <span class="material-symbols-outlined d-flex justify-content-center align-items-center"
                                    style="width: 50px ;height: 50px;"> account_circle </span>
                            @endif
                        </div>
                        <div class="col">
                            {{ $user->name }}
                        </div>
                    </div>
                </li>
            @empty
                <li class="list-group-item">No users found.</li>
            @endforelse


            <div class="d-flex justify-content-center align-items-center">
                <h1 class="text-black">post</h1>
            </div>

            <hr />
            <div class="grid-container">
                @forelse ($posts->take(10) as $post)
                    <x-post-item :post="$post" />
                @empty
                    <li class="list-group-item">No Posts found.</li>
                @endforelse
            </div>
            @if ($posts->count() > 10)
                <div class="text-center">
                    <a href="" class="btn btn-success">more</a>
                </div>
            @endif
        </ul>
    </div>
</x-app-layout>
