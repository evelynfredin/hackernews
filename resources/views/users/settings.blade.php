@extends('layout.main')

@section('content')


<div class="my-5 pb-10 border-b dark:border-primary-500">
    <h2 class="font-special font-semibold text-2xl md:text-3xl uppercase">Edit profile</h2>

    <form class="lg:w-5/6 lg:mx-auto mt-5" action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <label class="block">
            <span>Avatar:</span>
            <input class="formInput" type="file" accept="image/jpg, image/jpeg, image/png" name="avatar" id="avatar">
        </label>

        <label class="block mt-5">
            <span>Load image from url:</span>
            <input type="text" class="formInput imageFromUrl" name="urlImage" id="urlImage" placeholder="http://" />
        </label>


        <div class="preview-image"></div>

        @error('avatar')
        <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
            {{ $message }}
        </div>
        @enderror

        <label class="block mt-5">
            <span>Email:</span>
            <input class="formInput" type="email" name="email" id="email" value="{{ $user->email }}">
        </label>

        @error('email')
        <div class=" bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
            {{ $message }}
        </div>
        @enderror

        <label class="block mt-5">
            <span>Biography:</span>
            <textarea class="formInput" name="bio" id="bio" cols="30" rows="5">{{ $user->bio }}</textarea>
        </label>

        @error('bio')
        <div class="bg-red-500 py-1 px-3 mb-3 text-primary-100 mt-2">
            {{ $message }}
        </div>
        @enderror

        <button class="btnAlt shadow-offset mt-5 bg-accent hover:bg-primary-300 hover:text-primary-100" type="submit">Update</button>

    </form>

</div>
<script src="{{ asset('js/scripts.js') }}"></script>
@endsection
