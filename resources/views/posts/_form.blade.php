<div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
</div>

<div class="form-group">
    <label>Cover</label>
    <input type="file" name="cover" class="form-control">
</div>

<div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
        <option value=""></option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @if(old('category_id', $post->category_id) == $category->id) selected="" @endif>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Preview</label>
    <textarea name="preview" class="form-control">{{ old('preview', $post->preview) }}</textarea>
</div>

<div class="form-group">
    <label>Body</label>
    <textarea name="body" rows="8" class="form-control">{{ old('body', $post->body) }}</textarea>
</div>

<div class="form-group">
    <label>Tags</label>
    <select name="tags[]" class="form-control" multiple="">
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}" @if(in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray()))) selected="" @endif >{{ $tag->name }}</option>
        @endforeach
    </select>
</div>
