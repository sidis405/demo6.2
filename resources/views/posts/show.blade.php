@extends('layouts.app')

@section('content')
    @include('posts._post', ['showBody' => true])

    @can('delete', $post)
        <hr>
        <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @endcan
@endsection
