<x-app-layout>

    <form action="{{ route('user.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container bg-white mt-3 p-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row text-center">
                <div class="col-12 text-center">

                    @if (Auth::user()->profile_photo_path)
                    <img src="{{  url('storage/'.Auth::user()->profile_photo_path) }}"
                    alt="Profile Photo" class="img-fluid rounded-circle m-auto" style="width: 100px; height: 100px;">
                    @elseif (Auth::user()->image_url_google)
                    <img src="{{  Auth::user()->image_url_google }}"
                    alt="Profile Photo" class="img-fluid rounded-circle m-auto" style="width: 100px; height: 100px;">
                    @else
                    <span class="material-symbols-outlined"> account_circle </span>
                     @endif
                </div>

                <div class="col-12 mt-2">
                    <div class="form-group">
                        <label for="profile_image">Profile Image</label>
                        <input type="file" name="image" id="profile_image">

                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <x-section-border />
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input value="{{ $user->name }}" type="text" name="name" id="name" class="form-control"
                    placeholder="name" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">phone</label>
                <input value="{{ $user->phone }}" type="tel" class="form-control" name="phone" id="phone"
                    aria-describedby="helpId" placeholder="phone">
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">address</label>
                <input value="{{ $user->address }}" type="text" class="form-control" name="address" id="address"
                    aria-describedby="helpId" placeholder="address">
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div class="mb-3">
                <label for="discription" class="form-label">discription</label>
                <input value="{{ $user->discription }}" type="text" class="form-control" name="discription"
                    id="discription" aria-describedby="helpId" placeholder="discription">
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>

        </div>
    </form>
</x-app-layout>
