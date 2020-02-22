@extends('layouts.app')

@section('content')

    <h4>Edit "{{ $post->title }}"</h4>

    <form method="POST" action="{{ route('posts.update', $post) }}"  enctype="multipart/form-data">

        @csrf
        @method('PATCH')

        @include('posts._form')

        <button type="submit" class="btn btn-warning btn-block">Update</button>
    </form>

@endsection
