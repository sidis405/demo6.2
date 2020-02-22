@extends('layouts.app')

@section('content')

    <h4>Posts tagged as <b>"{{ $tag->name }}" ({{ $posts->total() }})</b></h4>

    @foreach($posts as $post)
        @include('posts._post')
        <hr>
    @endforeach

    {{ $posts->links() }}

@endsection
