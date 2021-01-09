@extends('layout.main')

@section('content')

<div class="pb-10">

    <div class="flex justify-between my-5 h-auto items-center">
        <div class="w-28 ">
            <img class="rounded-full object-cover" src="{{ $user->avatar }}" alt="User profile">
        </div>
        @can('edit', $user)
        <div class="flex flex-col text-center">
            <a href="{{ route('settings', auth()->user()->id) }}" class="btnAlt shadow-offset bg-accent hover:bg-primary-300 hover:text-primary-100">Edit profile</a>
            <a href="{{ route('password.update', auth()->user()->id) }}" class="mt-3 hover:text-accent">Change password</a>
        </div>
        @else
        <div class="flex flex-col text-center">
            <a href="#" class="btnAlt shadow-offset bg-accent hover:bg-primary-300 hover:text-primary-100 flex"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                </svg><span class="ml-2">Send message</span></a>
        </div>
        @endcan
    </div>
    <div class="bg-primary-100 py-6 px-10 rounded-lg dark:bg-primary-500">
        <h3 class="font-scpecial text-primary-300 font-medium text-2xl">{{ '@' . $user->username }}</h3>

        <div class="border-b border-accent mb-5 pb-5">
            <p>{{ $user->bio }}</p>
        </div>

        <div>
            <ul class="flex flex-col md:flex-row md:justify-between">
                <li>Joined {{ $user->created_at->diffForHumans() }}</li>
                <li class="text-accent hidden md:block"> • </li>
                <li>{{ ($user->voteCount()->count()) + ($user->commentCount()->count()) }} Karma</li>
                <li class="text-accent hidden md:block"> • </li>
                <li>Posted {{ $posts->count() }} {{ Str::plural('time', $posts->count()) }}</li>
                <li class="text-accent hidden md:block"> • </li>
                <li>Upvoted {{ $user->votes()->count() }} {{ Str::plural('post', $user->votes()->count()) }}</li>
            </ul>
        </div>
    </div>
    @can('edit', $user)
    <div class="flex justify-end mt-2">
        <form action="{{ route('user.destroy', auth()->user()->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 px-2 py-1 text-primary-100 text-sm hover:bg-red-700">Delete your account</button>
        </form>
    </div>
    @endcan
</div>


@if ($posts->count())
<h2 class="font-special font-semibold text-xl uppercase text-accent">{{ $user->username }}’s Posts ({{ $posts->count() }})</h2>

@foreach ($posts as $index => $post)

<div class="border-b dark:border-primary-500 py-6">
    <a class="hover:text-primary-300 dark:hover:text-primary-100" href="{{ route('posts.show', $post) }}">
        <h3 class="text-lg md:text-xl font-medium">
            {{ Str::title($post->title) }}
        </h3>
    </a>

</div>

@endforeach

@else

<p>{{ $user->username }} has not written any posts yet!</p>

@endif




@endsection
