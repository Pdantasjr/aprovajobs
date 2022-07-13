<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'job_author',
        'job_category',
        'deadline'
    ];

    public function jobCategory()
    {
        return $this->hasOne(JobCategories::class, 'id', 'job_category');
    }
}
