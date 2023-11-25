<x-app-layout>
    <h1>Followed Users</h1>
    <ul>
        @foreach ($followedUsers as $followedUser)
            <li>{{ $followedUser->name }}</li>
        @endforeach
    </ul>
</x-app-layout>
