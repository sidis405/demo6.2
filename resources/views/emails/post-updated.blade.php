@component('mail::message')
# Ciao {{ $user->name }}

The post "{{ $post->title }}" was updated.

@component('mail::button', ['url' => route('posts.show', $post)])
View updated post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
