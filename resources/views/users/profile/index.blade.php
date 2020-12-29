@extends('layout.main')

@section('content')

<div class="pb-10">

    <div class="flex justify-between my-5 h-auto items-center">
        <div class="w-28 ">
            <img class="rounded-full object-cover" src="img/avatar/dummy.jpg" alt="">
        </div>
        <div>
            <button class="btnAlt shadow-offset bg-accent hover:bg-primary-300 hover:text-primary-100">Edit profile</button>
        </div>
    </div>
    <div class="bg-primary-100 py-6 px-10 rounded-lg dark:bg-primary-500">
        <h3 class="font-scpecial text-primary-300 font-medium text-2xl">{{ '@' . $user->username }}</h3>

        <div class="border-b border-accent mb-5 pb-5">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas, officiis facilis. Ipsa, voluptates velit! Eaque minus, saepe assumenda debitis blanditiis nam iure harum. Quam ducimus delectus architecto optio quae, ad veniam perspiciatis numquam nihil maiores aut, quia eius, cumque ipsam!</p>
        </div>
        <div class="flex">
            <p>Joined {{ $user->created_at->diffForHumans() }} <span class="text-accent"> • </span> Posted {{ $posts->count() }} times <span class="text-accent"> • </span> Upvoted {{ $user->votes()->count()}} posts</p>
        </div>
    </div>
</div>


@if ($posts->count())
<h2 class="font-special font-semibold text-xl uppercase">Posts</h2>

@foreach ($posts as $index => $post)

<div class="border-b dark:border-primary-500 py-6">
    @if ($post->url)
    <a class="hover:text-primary-300 dark:hover:text-primary-100" href="{{ $post->url }}">
        <h3 class="text-lg">
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
</div>

@endforeach

@else

<p>There are no articles to show. Try <a href="{{ route('submit')}}">adding one</a></p>

@endif




@endsection
