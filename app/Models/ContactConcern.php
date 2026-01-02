<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class ContactConcern extends Model
{
    use HasFactory;
    protected $fillable = [
        'message'
    ];

    public function contacts(): HasOne
    {
        return $this->hasOne(Contact::class);
    }
}
