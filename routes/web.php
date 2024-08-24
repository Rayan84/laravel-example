<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
   return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
     return view('jobs.create');
});


Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // Validation
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
   // dd(request('title'));

});

 Route::get('/jobs/{id}/edit', function($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
 });

 Route::patch('/jobs/{id}', function ($id) {
    //validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // update
    $job = Job::findOrFail($id);
    // $job->salary = request('salary');
    // $job->title = request('title');
    // $job->save();
    $job->update([
        'title'=> request('title'),
        'salary' => request('salary')
    ]);
    //authorize
    //redirect
    return redirect('/jobs/' .$job->id);
 });

 Route::delete('jobs/{id}', function ($id) {
    //authorize
    //delete
    $job = Job::findOrFail($id);
    $job->delete();
    //redirect
    return redirect('/jobs');
 });

Route::get('/contact', function () {
    return view('contact');
});

