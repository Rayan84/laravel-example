<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home', [
        'jobs' => [
            [
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'title' => 'Programmer',
                'salary' => '$100,000'
            ],
            [
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ]
    ]);
});

Route::get('/jobs', function () {
    return view('jobs');
});

Route::get('/contact', function () {
    return view('contact');
});