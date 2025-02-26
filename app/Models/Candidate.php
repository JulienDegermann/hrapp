<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Candidate extends Model
{
    /**
     *  
     * @use HasFactory<\Database\Factories\ProfileFactory> 
     * */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'picture',
        'resume',
        'linkedin',
        'github',
        'applied_at',
    ];

    /**
     * auto cast date
     */
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'applied_at' => 'datetime',
    ];

    /**
     * get experience related to Skill
     * @return BelongsToMany - list of all Experiences::class related to a skill
     */
    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'candidates_jobs');
    }
}
