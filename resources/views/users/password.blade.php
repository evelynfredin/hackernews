@extends('layout.main')

@section('content')

<div class="my-5 pb-10 border-b dark:border-primary-500">
    <h2 class="font-special font-semibold text-2xl md:text-3xl uppercase">Edit profile</h2>

    <form class="lg:w-5/6 lg:mx-auto mt-5" action="{{ route('password.update', $user) }}" method="POST">

        @csrf
        @method('PUT')

        <label class="block mt-5">
            <span class="text-gray-700 dark:text-primary-100">New password:</span>
            <input class="formInput" placeholder="Make it strong" type="password" name="password" id="password">
        </label>

        @error('password')
        <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
            {{ $message }}
        </div>
        @enderror

        <label class="block mt-5">
            <span class="text-gray-700 dark:text-primary-100">Confirm new password:</span>
            <input class="formInput" placeholder="Make it match" type="password" name="password_confirmation" id="password_confirmation">
        </label>
        <button class="btnAlt shadow-offset mt-5 bg-accent hover:bg-primary-300 hover:text-primary-100" type="submit">Update password</button>

    </form>

</div>

@endsection
