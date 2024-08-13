<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model {
    use HasFactory;
    protected $table = 'jobs_listings';
    protected $fillable = ['title', 'salary'];
}

        


?>