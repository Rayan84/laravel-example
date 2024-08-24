<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Http\Controllers;

//Homepage
Route::get('/', [App\Http\Controllers\JobController::class, 'index']);

//Jobs index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// create
Route::get('/jobs/create', function () {
     return view('jobs.create');
});

// show
Route::get('/jobs/{job}', function (Job $job) {
    // $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

//Save a job
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
   // edit a job
 Route::get('/jobs/{job}/edit', function(Job $job) {
    return view('jobs.edit', ['job' => $job]);
 });

   // update
 Route::patch('/jobs/{job}', function (Job $job) {
    //authorize
    //validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // update
    //$job = Job::findOrFail($id);
    // $job->salary = request('salary');
    // $job->title = request('title');
    // $job->save();
    $job->update([
        'title'=> request('title'),
        'salary' => request('salary')
    ]);
    
    //redirect
    return redirect('/jobs/' .$job->id);
 });

 Route::delete('jobs/{job}', function (Job $job) {
    //authorize
    //delete
   // $job = Job::findOrFail($id);
    $job->delete();
    //redirect
    return redirect('/jobs');
 });

Route::get('/contact', function () {
    return view('contact');
});

