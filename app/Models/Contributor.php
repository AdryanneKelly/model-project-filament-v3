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
        'stacks',
        'city',
        'linkedin',
        'github',
        'photo'
    ];

    protected $casts = [
        'photo' => 'array',
        'stacks' => 'array',
    ];

    public function stacks()
    {
        return $this->belongsTo(Stack::class);
    }
}
