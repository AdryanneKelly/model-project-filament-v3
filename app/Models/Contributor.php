<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'city',
        
        'linkedin',
        'github',
        'photo'
    ];

    protected $casts = [
        'photo' => 'array',
        'stacks' => 'array'
    ];

    protected function stacks()
    {
        return $this->hasMany(Stack::class);
    }
}
