<h4>Archive</h4>
<ul>
    @foreach($archive as $record)
        <li><a href="/?month={{ $record->month }}&year={{ $record->year }}">{{ $record->month }} {{ $record->year }} ({{ $record->published }})</a></li>
    @endforeach
</ul>

<h4>Categories</h4>
<ul>
    @foreach($sidebarCategories as $category)
        <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }} ({{ $category->posts_count }})</a></li>
    @endforeach
</ul>

<h4>Tags</h4>
@foreach($sidebarTags as $tag)
    <a href="{{ route('tags.show', $tag) }}" style="font-size: {{ $tag->posts_count * 1.5  }}px">{{ $tag->name }} ({{ $tag->posts_count }})</a>
@endforeach
