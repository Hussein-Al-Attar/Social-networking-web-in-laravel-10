<x-app-layout>
    <h1>Followers</h1>
    <ul>
        @foreach ($followers as $follower)
            <li>{{ $follower->name }}</li>
        @endforeach
    </ul>
</x-app-layout>
