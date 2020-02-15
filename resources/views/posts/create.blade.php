@extends('layouts.app')

@section('content')

    <h4>Create a new post</h4>

    <form method="POST" action="{{ route('posts.store') }}">

        @csrf

        @include('posts._form')

        <button type="submit" class="btn btn-success btn-block">Save</button>
    </form>

@endsection
