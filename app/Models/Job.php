<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model {
    use HasFactory;

    protected $table = 'jobs_listings';

    protected $fillable = ['employer_id', 'title', 'salary'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags() {
        return $this->belongsToMany(Tags::class, foreignPivotKey: "job_listing)id");

    }
}
