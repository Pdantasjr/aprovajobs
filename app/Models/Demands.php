<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demands extends Model
{
    use HasFactory;

    protected $table = "demands";
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'job_author',
        'job_category',
        'deadline'
    ];
}
