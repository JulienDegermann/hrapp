<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Skill extends Model
{
    /**
     *  
     * @use HasFactory<\Database\Factories\ProfileFactory> 
     * */
    use HasFactory;

    protected $fillable = [
        'name',
        'version'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];


    /**
     * get experience related to Skill
     * @return BelongsToMany - list of all Experiences::class related to a skill
     */
    public function experiences(): BelongsToMany
    {
        return $this->belongsToMany(Experience::class, 'experiences_skills');
    }
}
