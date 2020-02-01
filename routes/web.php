<?php

Route::get('/', function () {
    //$name = 'Tony Stark';

    $tasks = [
        'Install Laravel',
        'Read Docs',
        'Profit'
    ];

    // return view('welcome', ['tasks' => $tasks]);

    // return view('welcome')->with(['tasks' => $tasks]);

    // return view('welcome')->withTasks($tasks);

    return view('welcome', compact('tasks'));
});
