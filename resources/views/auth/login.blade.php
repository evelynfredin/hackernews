@extends('layout.main')

@section('content')

<div class="w-full md:w-3/4 mx-auto">
    <h2 class="font-special font-semibold text-2xl md:text-3xl uppercase">Login</h2>

    <div class="mt-5 bg-primary-100 px-10 py-5 shadow-offsetLG w-full sm:w-3/4 mx-auto dark:bg-primary-500">

        @if(session('status'))
        <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 my-2">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">

            @csrf

            <label class="block">
                <span class="text-gray-700 dark:text-primary-100">Email:</span>
                <input class="formInput" placeholder="Your email" type="email" name="email" id="email" value="{{ old('email')}}">
            </label>

            @error('email')
            <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
                {{ $message }}
            </div>
            @enderror

            <label class=" block">
                <span class="text-gray-700 dark:text-primary-100">Password:</span>
                <input class="formInput" placeholder="Your password" type="password" name="password" id="password">
            </label>

            @error('password')
            <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
                {{ $message }}
            </div>
            @enderror

            <button class="btnAlt mt-5 bg-accent hover:bg-primary-400 hover:text-primary-100" type="submit">Login</button>
        </form>
    </div>
</div>

@endsection
