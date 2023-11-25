<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                {{-- <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div> --}}
                <!-- Navigation Links -->
                <div class="m-auto ml-2 bg-slate-500 row">
                    <div class="col">
                        <x-nav-link href="{{ route('home.index') }}" :active="request()->routeIs('home.index')">
                            <span class="material-symbols-outlined"> home </span>
                        </x-nav-link>
                    </div>
                    <div class="col">
                        <x-nav-link href="{{ route('search.index') }}" :active="request()->routeIs('search.index')">
                            <span class="material-symbols-outlined"> search </span>
                        </x-nav-link>
                    </div>
                    <div class="col">
                        <x-nav-link href="{{ route('user.index') }}" :active="request()->routeIs('user.index')">
                            @if (Auth::user()->profile_photo_path)
                                <img src="{{ url('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Photo"
                                    class="img-fluid rounded-circle m-auto" style="width: 25px ;height: 25px;">
                            @elseif (Auth::user()->image_url_google)
                                <img src="{{ Auth::user()->image_url_google }}" alt="Profile Photo"
                                    class="img-fluid rounded-circle m-auto" style="width: 25px ;height: 25px;">
                            @else
                                <span class="material-symbols-outlined"> account_circle </span>
                            @endif
                        </x-nav-link>
                    </div>
                    <div class="col">
                        <x-nav-link {{-- href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" --}}>
                            <span class="material-symbols-outlined">
                                task
                            </span>
                        </x-nav-link>
                    </div>
                    <div class="col">
                        <x-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                            <span class="material-symbols-outlined"> add_circle </span>
                        </x-nav-link>
                    </div>
                    <div class="col">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit">
                                <span class="material-symbols-outlined">logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
