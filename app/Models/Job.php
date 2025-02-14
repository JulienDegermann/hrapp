<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Job extends Model
{
    /**
     *  
     * @use HasFactory<\Database\Factories\ProfileFactory> 
     * */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'remuneration_min',
        'remuneration_max',
        'start_date',
        'image',
        'published_at',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'published_at' => 'datetime',
        'start_date' => 'date',
    ];

    /**
     * get experience related to Skill
     * @return BelongsToMany - list of all Experiences::class related to a skill
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'jobs_skills');
    }
}
