@extends('layout.main')

@section('content')

@if ($posts->count())

@foreach ($posts as $index => $post)

<x-post :post="$post" :index="$index" />

@endforeach

<div class="mt-10">
    {{ $posts->links('custompaginator') }}
</div>

@else

<p>There are no articles to show. Try <a href="{{ route('submit')}}">adding one</a></p>

@endif

@endsection
