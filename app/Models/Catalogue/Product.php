<?php

namespace App\Models\Catalogue;

//use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'images' => 'array',
        'prices' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
