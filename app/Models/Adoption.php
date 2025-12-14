<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'requested_at',
        'adopted_at',
        'message_from_application',
    ];

    public function animals(): HasOne
    {
        return $this->hasOne(Animal::class);
    }

    public function adopter(): HasOne
    {
        return $this->hasOne(Adopter::class);
    }

}
