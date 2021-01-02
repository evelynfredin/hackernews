@extends('layout.main')

@section('content')

@if ($comments->count())

<div class="flex flex-col my-5">
    <h2>Comments</h2>
    @foreach ($comments as $comment)
    <article class="py-6 px-10 border rounded-lg m-4 dark:border-primary-500">
        <p class="text-lg">{{ $comment->comment }}</p>
        <p class="my-3 text-sm">By <a class="text-primary-300 dark:text-accent dark:hover:text-primary-100" href="{{ route('user.profile', $comment->user) }}">{{ $comment->user->username }}</a> • {{ $comment->created_at->diffForHumans() }} • On: <a class="text-primary-300 dark:text-accent dark:hover:text-primary-100" href="{{ route('posts.show', $comment->post) }}">{{ Str::substr($comment->post->title, 0, 40) }}... </a></p>

        <div class="flex">
            @can('delete', $comment)
            <form action="{{ route('comments.destroy', $comment) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 px-2 py-1 text-primary-100 text-sm hover:bg-red-700">Delete</button>
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
</div>

<div class="mt-10">
    {{ $comments->links('custompaginator') }}
</div>


@else

<p>There are no articles to show. Try <a href="{{ route('submit')}}">adding one</a></p>

@endif

@endsection
