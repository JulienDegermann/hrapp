<?php

namespace App\Models;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
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
        'date_of_birth',
        'resume',
        'linkedin',
        'github'
    ];


    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'date_of_birth' => 'date',
    ];


    /**
     * get expreriences of profile
     * @return HasMany - a HasMany which contains profile's experiences
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
}
