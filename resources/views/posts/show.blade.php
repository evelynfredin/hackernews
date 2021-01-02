@extends('layout.main')

@section('content')

<article class="flex py-10 border-b dark:border-primary-500">
    @auth
    @if ($post->votedBy(auth()->user()))
    <form action="{{ route('posts.votes', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="flex flex-col justify-center max-h-20 items-center rounded-md py-2 px-3 mr-5 bg-primary-100 dark:bg-primary-500">
            <div class="text-xl h-auto items-center font-special font-semibold text-accent dark:text-primary-300 inline-flex">
                {{ $post->votes->count() }}
                <span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
            </div>
        </button>
    </form>

    @else

    <form action="{{ route('posts.votes', $post) }}" method="POST">
        @csrf
        <button class="flex flex-col justify-center max-h-20 items-center rounded-md py-2 px-3 mr-5 bg-primary-100 dark:bg-primary-500">
            <div class="text-xl h-auto items-center font-special font-semibold text-accent dark:text-primary-300 inline-flex">
                {{ $post->votes->count() }}
                <span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
        </button>
    </form>

    @endif
    @endauth

    @guest

    <a href="{{ route('login') }}" class="flex flex-col justify-center max-h-10 items-center rounded-md py-2 px-3 mr-5 bg-primary-100 dark:bg-primary-500">
        <div class="text-xl h-auto items-center font-special font-semibold text-accent dark:text-primary-300 inline-flex">
            {{ $post->votes->count() }}
            <span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                </svg>
            </span>
        </div>
    </a>

    @endguest

    <div>
        @if ($post->url)
        <a class="hover:text-primary-300 dark:hover:text-primary-100" href="{{ $post->url }}">
            <h3 class="text-xl md:text-2xl font-medium">
                {{ Str::title($post->title) }}
                <span class="text-accent dark:text-primary-300 font-light text-base hover:underline"> {{ @parse_url($post->url)['host'] }} </span>
            </h3>
        </a>

        @else
        <h3 class="text-xl md:text-2xl font-medium">
            {{ Str::title($post->title) }}
        </h3>

        @endif
        <p>By
            <a class="dark:text-accent dark:hover:text-primary-100" href="{{ route('user.profile', $post->user) }}">{{ $post->user->username }}</a>
            {{ $post->created_at->diffForHumans() }}
        </p>
        @if ($post->description)
        <p class="py-5 text-xl">{{ $post->description }}</p>
        @endif
        <div class="mt-3 text-primary-100 flex">
            @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 px-2 py-1 text-primary-100 text-sm hover:bg-red-700">Delete</button>
            </form>
            @endcan

            @can('edit', $post)
            <form action="{{ route('posts.edit', $post) }}" method="get">
                @csrf
                <button type="submit" class="bg-green-600 px-2 py-1 text-primary-100 text-sm hover:bg-green-700 ml-3">Edit</button>
            </form>
            @endcan
        </div>
    </div>
</article>

<div>
    @auth
    <form action="{{ route('posts.comments', $post->id) }}" method="POST">
        @csrf
        <label class="block mt-5">
            <span>Got something to say?</span>
            <textarea class="formInput" name="comment" id="comment" cols="30" rows="3" placeholder="Add a comment"></textarea>
        </label>

        @error('comment')
        <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
            {{ $message }}
        </div>
        @enderror

        <button class="btnAlt shadow-offset mt-5 bg-accent hover:bg-primary-300 hover:text-primary-100" type="submit">Submit</button>
    </form>
</div>
@else
<p>Signin to comment</p>
@endauth

<h3 class="font-special text-lg font-semibold mt-20 mb-10 uppercase">Comments ({{ $post->comments->count() }})</h3>
@foreach ($post->comments as $comment)

<article class="py-6 px-10 border rounded-lg m-4 dark:border-primary-500">
    <p class="text-lg">{{ $comment->comment }}</p>
    <p class="my-3 text-sm">By <a class="text-primary-300 dark:text-accent dark:hover:text-primary-100" href="{{ route('user.profile', $comment->user) }}">{{ $comment->user->username }}</a> • {{ $comment->created_at->diffForHumans() }}</p>

    <div class="flex">
        @can('delete', $comment)
        <form action="{{ route('comments.destroy', $comment) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 px-2 py-1 text-primary-100 text-sm hover:bg-red-700">Delete comment</button>
        </form>
        @endcan

        @can('edit', $comment)
        <form action="{{ route('comments.edit', $comment) }}" method="get" class="ml-4">
            @csrf
            <button type="submit" class="bg-green-600 px-2 py-1 text-primary-100 text-sm hover:bg-green-700">Edit comment</button>
        </form>
        @endcan
    </div>
</article>

@endforeach

@endsection
