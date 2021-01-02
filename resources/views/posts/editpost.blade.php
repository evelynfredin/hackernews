@extends('layout.main')

@section('content')

<div class="my-5 pb-10 border-b dark:border-primary-500">
    <h2 class="font-special font-semibold text-2xl md:text-3xl uppercase">Edit post</h2>

    <form class="lg:w-5/6 lg:mx-auto mt-5" action="{{ route('posts.update', $post) }}" method="POST">

        @csrf
        @method('PUT')
        <label class="block">
            <span>Title:</span>
            <input class="formInput" type="text" name="title" id="title" value="{{ $post->title }}">
        </label>

        @error('title')
        <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
            {{ $message }}
        </div>
        @enderror

        <label class="block mt-5">
            <span>URL:</span>
            <input class="formInput" type="text" name="url" id="url" value="{{ $post->url }}">
        </label>

        @error('url')
        <div class=" bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
            {{ $message }}
        </div>
        @enderror

        <label class="block mt-5">
            <span>Description:</span>
            <textarea class="formInput" name="description" id="description" cols="30" rows="5">{{ $post->description }}</textarea>
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
