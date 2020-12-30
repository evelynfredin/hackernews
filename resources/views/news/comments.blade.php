@extends('layout.main')

@section('content')

@if ($comments->count())

<div class="flex flex-col my-5">
    <h2>Comments</h2>
    @foreach ($comments as $comment)
    <article class="py-6 px-10 border rounded-lg m-4 dark:border-primary-500">
        <p class="text-lg">{{ $comment->comment }}</p>
        <p class="my-3 text-sm">By <a class="text-primary-300 dark:text-accent dark:hover:text-primary-100" href="{{ route('user.profile', $comment->user) }}">{{ $comment->user->username }}</a> • {{ $comment->created_at->diffForHumans() }} • On: <a class="text-primary-300 dark:text-accent dark:hover:text-primary-100" href="{{ route('news.show', $comment->post) }}">{{ Str::substr($comment->post->title, 0, 40) }}... </a></p>
    </article>
    @endforeach


</div>

@else

<p>There are no articles to show. Try <a href="{{ route('submit')}}">adding one</a></p>

@endif

@endsection
