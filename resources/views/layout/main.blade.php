<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacker News</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 mx-5 text-primary-400 font-body dark:bg-primary-400 dark:text-primary-200">
    <header class="container mx-auto flex justify-between py-6 items-center border-b border-gray-200">
        <div class="logo">
            <a href="#">
                <svg class="fill-current text-primary-400 dark:text-accent" width="125" height="50" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 11v1h1v-1H4zm19 0v1h-1v-1h1zM3 10H1V8h2V0h7v7h4V0h7v8h-2v2h2v5h-2v1h3v2h-4v1h-4v-7h-4v7H0v-1h4v-2H1v-1h2v-5zm41 1v1h-1v-1h1zm-17 7v-2h-3v-1h2l1-3h1v-1h-1l1-1h-1V8h1l3-8h7l2 8h-1v2h2l2 5h-2v1h4v2h-4v1h-4l-3-8-2 8H22v-1h5zm20-7v1h2v-1h-2zm18 0v1h-1v-1h1zm-14 7v-2h-5v-1h1l-1-5h-2V8h2c0-2 1-4 3-5 1-2 4-3 6-3h7v7h-7l-2 1h-2v2h2v2h9v3h-1v1h3v2h-5v1H49v-1h2zm17-7v1h1v-1h-1zm15 0v1h-2v-1h2zm-15 7v-2h-3v-1h1v-5h-1V8h1V0h7v7l4-7h7l-4 8h-2v2h1l3 5h-1v1h3v2h-3v1h-4l-4-7v7h-9v-1h4zm21-7v1h1v-1h-1zm15 0v1h-1v-1h1zm-16-1h-2V8h2V0h13v5h-6v2h6v1h-1v2h1v2h-6v2h6v1h-1v1h3v2h-4v1H85v-1h4v-2h-3v-1h2v-5zm24-5v3h2l1-1-1-2h-2zm-5 6v1h1v-1h-1zm16 0v1h-1v-1h1zm-16 7v-2h-3v-1h2v-5h-2V8h2V0h11c3 0 5 2 5 7v1h-2v2h2l-3 2 2 3h-1v1h4v2h-3v1h-4l-5-7v7h-9v-1h4zM20 50l-8-13v13H2V22h10l8 13V22h10v28H20zm34-28v8H44v2h10v8H44v2h10v8H34V22h20zm24 22l-2 6h-9l-9-28h10l4 12 3-12h7l3 12 4-12h9l-8 28h-9l-3-6zm31-22h13v8h-9l-2 1 2 1h4c5 0 7 3 7 9s-2 9-7 9h-14v-8h10l2-1-2-1h-4c-6 0-8-3-8-9s2-9 8-9z" /></svg>
            </a>
        </div>
        <button class="md:hidden">
            <svg class="w-9 h-9" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 7a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 13a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <nav class="hidden md:block">
            <ul class="flex uppercase font-special font-semibold text-lg">
                <li><a class="nav-item" href="#">Top</a></li>
                <li><a class="nav-item" href="#">New</a></li>
                <li><a class="nav-item" href="#">Comments</a></li>
                <li><a class="nav-item" href="#">Submit</a></li>
            </ul>
        </nav>
        <div class="hidden md:block">
            <ul class="flex uppercase font-special font-semibold text-lg">
                <li><a class="btn bg-primary-100 hover:bg-accent" href="#">Login</a></li>
                <li><a class="btn bg-accent ml-4 hover:bg-primary-100" href=" #">Register</a></li>
            </ul>
        </div>
    </header>
    <main>
        <p>hello</p>
    </main>

    @yield('content')
</body>

</html>
