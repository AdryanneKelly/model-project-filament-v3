<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stack extends Model
{
    use HasFactory;

    protected $fillable = [
        'stack_name'
    ];

    public function contributors()
    {
        return $this->belongsTo(Contributor::class);
    }
}
