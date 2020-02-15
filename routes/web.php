<?php

Route::get('/', 'PostsController@index')->name('posts.index');;
Route::get('posts/create', 'PostsController@create')->name('posts.create');
Route::get('posts/{post}', 'PostsController@show')->name('posts.show');
Route::post('posts', 'PostsController@store')->name('posts.store');

// REST - Restful Controllers

// index    - GET       - /posts                - posts.index   - PostsController@index     -  visionare tutti i post
// show     - GET       - /posts/{post}         - posts.show    - PostsController@show      - visionare un singolo post
// create   - GET       - /posts/create         - posts.create  - PostsController@create    - mostrare form creazione nuovo record
// store    - POST      - /posts                - posts.store   - PostsController@store     - salvare un nuovo record

// edit     - GET       - /posts/{post}/edit    - posts.edit    - PostsController@edit      - mostrae form di modifica record esistente
// update   - PATCH|PUT - /posts/{post}         - posts.update  - PostsController@update    - salvataggio modifiche record esistente
// destroy  - DELETE    - /posts/{post}         - posts.destroy - PostsController@destroy   - cancellare un record


Auth::routes();
