<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'phone',
    ];

    public function contact_concerns(): HasMany
    {
        return $this->hasMany(ContactConcern::class);
    }
}
