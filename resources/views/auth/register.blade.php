@extends('layout.main')

@section('content')

<div class="w-full md:w-3/4 mx-auto">
    <h2 class="font-special font-semibold text-2xl md:text-3xl uppercase">Sign up</h2>
    <p>By continuing, you agree to our <a href="#">User Agreement</a> and <a href="#">Privacy Policy</a>.</p>

    <div class="mt-5 bg-primary-100 px-10 py-5 shadow-offsetLG w-full sm:w-3/4 mx-auto dark:bg-primary-500">
        <form action="{{ route('register') }}" method="POST">

            @csrf

            <label class="block">
                <span class="text-gray-700 dark:text-primary-100">Email:</span>
                <input class="formInput" placeholder="email@email.com" type="email" name="email" id="email" value="{{ old('email')}}">
            </label>

            @error('email')
            <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
                {{ $message }}
            </div>
            @enderror

            <label class=" block">
                <span class="text-gray-700 dark:text-primary-100">Username:</span>
                <input class="formInput" placeholder="Username" type="username" name="username" id="username" value="{{ old('username')}}">
            </label>

            @error('username')
            <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
                {{ $message }}
            </div>
            @enderror

            <label class=" block">
                <span class="text-gray-700 dark:text-primary-100">Password:</span>
                <input class="formInput" placeholder="Make it strong" type="password" name="password" id="password">
            </label>

            @error('password')
            <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
                {{ $message }}
            </div>
            @enderror

            <label class="block">
                <span class="text-gray-700 dark:text-primary-100">Password confirmation:</span>
                <input class="formInput" placeholder="Make it match" type="password" name="password" id="password">
            </label>

            <div class="flex mt-6">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox">
                    <span class="ml-2">I want the newsletter</span>
                </label>
            </div>
            <button class="btnAlt mt-5 bg-accent hover:bg-primary-400 hover:text-primary-100" type="submit">Register</button>
        </form>
    </div>
</div>

@endsection
