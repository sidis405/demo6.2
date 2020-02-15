@extends('layouts.app')

@section('content')

    <h4>Latest posts</h4>

    @foreach($posts as $post)
        @include('posts._post')
        <hr>
    @endforeach

    {{ $posts->links() }}

@endsection
