<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Carbon;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'temper',
        'coat',
        'description',
        'vaccin',
    ];

    public function adopters(): BelongsToMany
    {
        return $this->belongsToMany(Adopter::class);
    }

    public function adoptions(): HasMany
    {
        return $this->hasMany(Adoption::class);
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    public function specie(): HasOneThrough
    {
        return $this->hasOneThrough(Specie::class, Breed::class);
    }

    public function vaccins(): BelongsToMany
    {
        return $this->belongsToMany(Vaccin::class);
    }

    public function coat(): BelongsTo
    {
        return $this->belongsTo(Coat::class);
    }

    public function age(): int
    {
        return Carbon::parse($this->attributes['age'])->age;
    }


}
