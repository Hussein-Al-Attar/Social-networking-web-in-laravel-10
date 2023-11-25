@extends('posts.app')

@section('content')
    <div class="container">
        <h1>Edit Tag</h1>
        <form action="{{ route('tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $tag->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
