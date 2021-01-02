@extends('layout.main')

@section('content')

<div class="my-5 pb-10 border-b dark:border-primary-500">
    <h2 class="font-special font-semibold text-2xl md:text-3xl uppercase">Add a new post</h2>

    <form class="lg:w-5/6 lg:mx-auto mt-5" action="{{ route('submit') }}" method="POST">

        @csrf

        <label class="block">
            <span>Title:</span>
            <input class="formInput" type="text" name="title" id="title" placeholder="Add a title" value="{{ old('title') }}">
        </label>

        @error('title')
        <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
            {{ $message }}
        </div>
        @enderror

        <label class="block mt-5">
            <span>URL:</span>
            <input class="formInput" type="text" name="url" id="url" placeholder="Add a URL" value="{{ old('url') }}">
        </label>

        @error('url')
        <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
            {{ $message }}
        </div>
        @enderror

        <label class="block mt-5">
            <span>Description:</span>
            <textarea class="formInput" name="description" id="description" cols="30" rows="5" placeholder="Add a description"></textarea>
        </label>

        @error('description')
        <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
            {{ $message }}
        </div>
        @enderror

        <button class="btnAlt shadow-offset mt-5 bg-accent hover:bg-primary-300 hover:text-primary-100" type="submit">Submit</button>

    </form>

</div>

@endsection
