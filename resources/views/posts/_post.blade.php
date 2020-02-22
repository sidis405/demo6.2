<div class="card">
    <img src="/storage/{{ $post->cover }}" style="width: 100%">
    <div class="card-header">
        <h5><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h5>
        <small>
            by <b>{{ $post->user->name }}</b>
            on <b>{{ $post->category->name }}</b>

            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}">[Edit]</a>
            @endcan
        </small>
    </div>
    <div class="card-body">
        <p>
            {{ $post->preview }}
        </p>

        @if(isset($showBody))
            <p>
                {{ $post->body }}
            </p>
        @endif
    </div>
    <div class="card-footer">
        created <b>{{ $post->created_at->diffForHumans() }}</b>
        {{ $post->tags->pluck('name')->implode(', ') }}
    </div>
</div>
