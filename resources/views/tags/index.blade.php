<x-app-layout>
    <div class="container">
        <h1>Tags</h1>
        <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Create Tag</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Posts</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            @foreach ($tag->posts as $post)
                                {{ $post->title }}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this tag?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
