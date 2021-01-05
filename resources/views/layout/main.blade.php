<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacker News</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
</head>

<body>

    <header x-data="{ isOpen: false }">
        <div class="mobile-wrapper">
            <div>
                <a href="{{ route('home') }}">
                    <svg class="fill-current text-primary-400 dark:text-accent" width="125" height="50" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 11v1h1v-1H4zm19 0v1h-1v-1h1zM3 10H1V8h2V0h7v7h4V0h7v8h-2v2h2v5h-2v1h3v2h-4v1h-4v-7h-4v7H0v-1h4v-2H1v-1h2v-5zm41 1v1h-1v-1h1zm-17 7v-2h-3v-1h2l1-3h1v-1h-1l1-1h-1V8h1l3-8h7l2 8h-1v2h2l2 5h-2v1h4v2h-4v1h-4l-3-8-2 8H22v-1h5zm20-7v1h2v-1h-2zm18 0v1h-1v-1h1zm-14 7v-2h-5v-1h1l-1-5h-2V8h2c0-2 1-4 3-5 1-2 4-3 6-3h7v7h-7l-2 1h-2v2h2v2h9v3h-1v1h3v2h-5v1H49v-1h2zm17-7v1h1v-1h-1zm15 0v1h-2v-1h2zm-15 7v-2h-3v-1h1v-5h-1V8h1V0h7v7l4-7h7l-4 8h-2v2h1l3 5h-1v1h3v2h-3v1h-4l-4-7v7h-9v-1h4zm21-7v1h1v-1h-1zm15 0v1h-1v-1h1zm-16-1h-2V8h2V0h13v5h-6v2h6v1h-1v2h1v2h-6v2h6v1h-1v1h3v2h-4v1H85v-1h4v-2h-3v-1h2v-5zm24-5v3h2l1-1-1-2h-2zm-5 6v1h1v-1h-1zm16 0v1h-1v-1h1zm-16 7v-2h-3v-1h2v-5h-2V8h2V0h11c3 0 5 2 5 7v1h-2v2h2l-3 2 2 3h-1v1h4v2h-3v1h-4l-5-7v7h-9v-1h4zM20 50l-8-13v13H2V22h10l8 13V22h10v28H20zm34-28v8H44v2h10v8H44v2h10v8H34V22h20zm24 22l-2 6h-9l-9-28h10l4 12 3-12h7l3 12 4-12h9l-8 28h-9l-3-6zm31-22h13v8h-9l-2 1 2 1h4c5 0 7 3 7 9s-2 9-7 9h-14v-8h10l2-1-2-1h-4c-6 0-8-3-8-9s2-9 8-9z" />
                    </svg>
                </a>
            </div>
            <div class="md:hidden">
                <button id="burger" aria-label="Open Menu" class="btn-square" @click="isOpen = !isOpen">
                    <svg class="w-9 h-9 fill-current dark:text-accent" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 7a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 13a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        <nav :class="isOpen ? 'show' : 'hidden'" id="menu">
            <ul class="font-special font-semibold text-2xl md:text-lg md:flex md:mr-10 text-center md:text-left">
                <li class="nav-item cursor-pointer"><a href="{{ route('home') }}">Top</a></li>
                <li class="nav-item cursor-pointer"><a href="{{ route('latest') }}">Latest</a></li>
                <li class="nav-item cursor-pointer"><a href="{{ route('comments') }}">Comments</a></li>
                <li class="nav-item cursor-pointer"><a href="{{ route('submit') }}">Submit</a></li>
            </ul>

            <ul class="md:flex w-auto text-center text-xl md:text-sm">

                @auth
                <div class="hidden md:block">
                    <li class="relative" x-data="{ isOpen: false }">
                        <button class="flex h-auto items-center focus:outline-none" @click="isOpen = true" @keydown.escape="isOpen = false">
                            <img class="w-10 h-10 object-contain rounded-full border border-accent" src="{{ auth()->user()->avatar }}" alt="User profile"></a>
                            <svg class="w-6 h-6 hidden md:block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <ul class="nav-modal hidden text-base" x-show="isOpen" @click.away="isOpen = false">
                            <li><a class="hover:text-primary-300" href="/user/{{ auth()->user()->username }}">Profile</a></li>
                            <li><a class="hover:text-primary-300" href="{{ route('settings', auth()->user()->id) }}">Settings</a></li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li class="border-t border-primary-300">
                                    <button type="submit" class="md:mr-5 my-10 md:my-0 text-md hover:text-accent">
                                        <span class="font-semibold uppercase text-accent hover:text-primary-300">Logout</span>
                                    </button>
                                </li>
                            </form>
                        </ul>

                    </li>
                </div>

                <div class="md:hidden">
                    <ul>
                        <li class="mt-10"><a class="hover:text-primary-300" href="/user/{{ auth()->user()->username }}">Profile</a></li>
                        <li><a class="hover:text-primary-300" href="{{ route('settings', auth()->user()->id) }}">Settings</a></li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <li>
                                <button type="submit" class="md:mr-5 my-5 md:my-0 text-md hover:text-accent">
                                    <span class="font-semibold uppercase text-accent hover:text-primary-300">Logout</span>
                                </button>
                            </li>
                        </form>
                    </ul>
                </div>
                @endauth

                @guest
                <li class="btn md:mr-5 bg-primary-100 hover:bg-accent my-5 md:my-0 cursor-pointer"><a href="{{ route('login') }}">Login</a></li>
                <li class="btn bg-accent hover:bg-primary-100 cursor-pointer"><a href="{{ route('register') }}">Sign up</a></li>
                @endguest
            </ul>

        </nav>
    </header>

    <main class="container mx-auto my-2 p-5 md:max-w-4xl">
        @yield('content')
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
