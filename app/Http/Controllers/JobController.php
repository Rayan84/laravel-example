<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index() {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create() {
        return view('jobs.create');
    }
    
    public function show(Job $job) {
        //dd($job->title);
        return view('jobs.show', ['job'=> $job]);
    }

    public function store() {
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

    }

    public function post() {

    }

    public function edit(Job $job) {
        return view('jobs.edit', ['job' => $job]);

    }
    
    public function update() {
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
    }

    public function destroy(Job $job) {
         //authorize
    //delete
   // $job = Job::findOrFail($id);
    $job->delete();
    //redirect
    return redirect('/jobs');
    
    
    //redirect
    return redirect('/jobs/' .$job->id);
    }

    
}
