@extends('layout.main')

@section('content')

<article class="flex py-10 border-b dark:border-primary-500">
    <div class="w-full">
        <form action="{{ route('comments.update', $comment) }}" method="POST">
            @csrf
            @method('PUT')
            <label class="block mt-5">
                <span class="font-special font-semibold text-2xl md:text-3xl uppercase">Edit comment</span>
                <textarea class="formInput" name="comment" id="comment" cols="30" rows="3">{{ $comment->comment }}</textarea>
            </label>

            @error('comment')
            <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
                {{ $message }}
            </div>
            @enderror

            <button class="btnAlt shadow-offset mt-5 bg-accent hover:bg-primary-300 hover:text-primary-100" type="submit">Submit</button>
        </form>
    </div>

    @endsection
