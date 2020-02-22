@extends('layouts.app')

@section('content')

    @if(request('month') !== null && request('year') !== null )
        <h4>Posts crated in {{ request('month') }} {{ request('year') }} ({{ $posts->total() }})</h4>
    @else
        <h4>Latest posts</h4>
    @endif

    @foreach($posts as $post)
        @include('posts._post')
        <hr>
    @endforeach

    {{ $posts->appends('month', request('month'))->appends('year', request('year'))->links() }}

@endsection
