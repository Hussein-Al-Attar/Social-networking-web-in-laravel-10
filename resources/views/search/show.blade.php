<x-app-layout>
    <div class="container">
        <h1>Search</h1>

        <form action="{{ route('search.show') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search users">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        @if ($posts->isEmpty())
            <p>No users found.</p>
        @else
            <div class="grid-container">

                @foreach ($posts->take(10) as $post)
                    <x-post-item :post="$post" />
                @endforeach

            </div>
        @endif
    </div>
</x-app-layout>
