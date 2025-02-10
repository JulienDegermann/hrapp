<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Experience extends Model
{
    /**
     *  
     * @use HasFactory<\Database\Factories\ProfileFactory> 
     * */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'github',
        'url',
        'created_at',
        'updated_at',
        'picture'
    ];

    /**
     * get profile which onw experience
     * @return BelongTo - a BelongsTo refering to profile
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    // /**
    //  * get skills related to Experience
    //  * @return BelongsToMany - list of all Experiences::class related to a skill
    //  */
    // public function experiences(): BelongsToMany
    // {
    //     return $this->belongsToMany(Skill::class);
    // }

    /**
     * get experience related to Skill
     * @return BelongsToMany - list of all Skill::class related to an Experience
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'experiences_skills');
    }
}
