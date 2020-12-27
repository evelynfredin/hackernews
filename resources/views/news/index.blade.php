@extends('layout.main')

@section('content')

@if($posts->count())

@foreach($posts as $index => $post)

<article class="flex py-10 border-b dark:border-primary-500">
    <button class="flex flex-col justify-center max-h-20 items-center rounded-md py-2 px-5 mr-5 bg-primary-100 dark:bg-primary-500">
        <div class="text-3xl font-special text-accent px-3 font-semibold border-b-2 border-gray-400 dark:text-primary-300">{{ ++$index }}</div>
        <div class="text-xl font-special font-semibold text-accent dark:text-primary-300">80</div>
    </button>
    <div>
        @if($post->url)
        <a class="hover:text-primary-300 dark:hover:text-primary-100" href="{{ $post->url }}">
            <h3 class="text-lg md:text-xl font-medium">
                {{ $post->title }}
                <span class="text-accent dark:text-primary-300 font-light text-base hover:underline"> {{ @parse_url($post->url)['host'] }} </span>
            </h3>
        </a>

        @else
        <a class="hover:text-primary-300 dark:hover:text-primary-100" href="#">
            <h3 class="text-lg md:text-xl font-medium">
                {{ $post->title }}
            </h3>
        </a>

        @endif
        <p>By
            <a class="dark:text-accent dark:hover:text-primary-100" href="#">{{ $post->user->username }}</a>
            {{ $post->created_at->diffForHumans() }} •
            <a class="dark:text-accent dark:hover:text-primary-100" href="#">34 comments</a>
        </p>
    </div>
</article>

@endforeach

@else
<p>There are no articles to show. Try <a href="{{ route('submit') }}">adding one</a></p>

@endif

@endsection
